<?php
/**
 * Created by PhpStorm.
 * User: Neo
 * Date: 17.04.2018
 * Time: 9:33
 */

namespace frontend\models;

use common\models\Feedback;
use common\models\Files;
use common\models\Order;
use common\models\OrderServiceList;
use common\models\ServiceList;
use common\models\VacancyOrder;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\FileHelper;
use yii\web\Response;
use yii\base\Model;
use yii\web\UploadedFile;

class SendForm extends Model
{

    const VACANCY = 'Заявка на вакансию';
    const USULUGI = 'Заявка на услугу';
    const FEEDBACK = 'Отзыв';

    public $name;
    public $phone;
    public $email;
    public $skype;
    public $message;
    public $subject;
    public $radioListForm;
    public $files;
    public $file;
    public $site;

    public $thankMessage;

    public $radioList;

    public function rules()
    {
        return [
            [['name', 'phone', 'email', 'skype', 'message', 'subject', 'site'], 'string'],
            [['name', 'phone', 'email'], 'required', 'message' => "Неверно заполненое поле"],
            [['email'], 'email', 'message' => "Неверно заполненое поле"],
            [['phone'], 'phoneLength'],
//            [['phone'], 'frontend\components\PhoneValidator'],
            [['radioListForm'], 'safe'],
            [['files'], 'file', 'maxFiles' => 4, 'maxSize' => 1024 * 1024 * 2, 'tooBig' => 'Максимальный размер файла 2 мб', 'wrongExtension' => 'Максимальное количество файлов 4'],
            [['file'], 'file', 'maxSize' => 1024 * 1024 * 2, 'tooBig' => 'Максимальный размер файла 2 мб'],
        ];
    }

    /**
     * правило валидации для поля телефона
     */
    public function phoneLength()
    {
        $this->phone = str_replace(array('_'), '', $this->phone);
        if (strlen($this->phone) < 16) {
            $this->addError('phone', "Неверно заполненое поле");
        }
    }

    public function attributeLabels()
    {
        return [
            "name" => "Ваше имя, фамилия *",
            "phone" => "Ваш номер телефона *",
            "email" => "Ваш e-mail *",
            "skype" => "Ваш skype",
            "site" => "Ваш сайт"
        ];
    }

    /**
     * устанавливает список услуш в форме
     */
    public function setRadioList()
    {
        if (is_null($this->radioList)) {
            /**
             * @var $serviceList [] ServiceList
             */
            $serviceList = Yii::$app->cache->getOrSet('service-list-send-form', function (){
                return ServiceList::find()->all();
            });

            foreach ($serviceList as $item) {
                $this->radioList[$item->id] = $item->name;
            }
        }
    }

    /**
     * устанавливает список для сообщения на почту после отправки формы
     */
    public function setRadioListForm()
    {
        $this->setRadioList();
        if (!empty($this->radioListForm)) {
            foreach ($this->radioListForm as $key => $item) {
                $this->radioListForm[$key] = $this->radioList[$item];
            }
        }
    }

    /**
     * @param $post [] массив с POST данными
     * сохраняет данные после отправки формы
     */
    public function save($post)
    {
        switch ($this->subject) {
            case self::USULUGI:
                $order = new Order();
                $orderData['Order'] = $post['SendForm'];
                $order->load($orderData);
                $order->save();

                $this->saveOrderServiceList($order);

                $this->saveFiles(\frontend\models\Files::ORDER, $order, 'order');

                $this->thankMessage = "Спасибо за, то что выбрали нашу компанию, мы с Вами скоро свяжемся. </br>";
                break;
            case self::FEEDBACK:
                $feedback = new Feedback();
                $feedbackData['Feedback'] = $post['SendForm'];
                $feedback->load($feedbackData);
                $feedback->status = Feedback::STATUS_DISABLED;
                $feedback->save();

                $this->saveFile(\frontend\models\Files::FEEDBACK, $feedback->id, 'feedback', $this->file);

                $this->thankMessage = 'Спасибо за оставленный отзыв. </br>';
                break;
            case self::VACANCY:
                $vacancy = new VacancyOrder();
                $vacancyData['VacancyOrder'] = $post['SendForm'];
                $vacancy->load($vacancyData);
                $vacancy->save();
                $this->saveFiles(\frontend\models\Files::VACANCY_ORDER, $vacancy, 'vacancy_order');
                $this->thankMessage = 'Спасибо отклик на вакансию, мы с Вами скоро свяжемся. </br>';
        }
    }


    /**
     * сохраняет файлы
     * @param Order|VacancyOrder $model
     * @param number $extension
     * @param string $path
     */
    private function saveFiles($extension, $model, $path)
    {

        foreach ($this->files as $item) {
            /**
             * @var $item UploadedFile
             */
            $this->saveFile($extension, $model->id, $path, $item);
        }
    }

    /**
     * сохраняет файл
     * @param integer $extension
     * @param integer $model_id
     * @param string $path
     * @param UploadedFile $file
     * @throws \yii\base\Exception
     */
    private function saveFile($extension, $model_id, $path, $file)
    {
        $modelFile = new \frontend\models\Files();
        $modelFile->name = Yii::$app->security->generateRandomString(16) . '.' . $file->extension;
        $modelFile->setExtensionId($extension, $model_id);
        $modelFile->save();
        FileHelper::createDirectory(Yii::getAlias("uploads/{$path}/"));
        $file->saveAs(Yii::getAlias("@frontend/web/uploads/{$path}/" . $modelFile->name));
    }

    /**
     * сохраняет список выбранных услуг, которые отметил посетитель на сайте
     * @param $order Order
     */
    private function saveOrderServiceList($order)
    {
        if (empty($this->radioListForm)) return;
        foreach ($this->radioListForm as $item) {
            $orderServiceList = new OrderServiceList();
            $orderServiceList->order_id = $order->id;
            $orderServiceList->service_list_id = $item;
            $orderServiceList->save();
        }
    }

    static public function sendMail()
    {
        if ($_POST) {
            // обрабатываем запрос
            $adminEmail = Yii::$app->params['adminEmail'];
//				$adminEmail = get_option('admin_email');
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $skype = $_POST['skype'];
            $city = $_POST['city'] ?? '';
            $specialty = $_POST['specialty'] ?? '';
            $subject = $_POST['subject'] ?? '';
            $service = $_POST['service'] ?? '';
            $text = $_POST['text'];
            $my_file = "";
            /*if (!empty($_FILES['file']['tmp_name'])) {
                $path = $_FILES['file']['name'];
                if (copy($_FILES['file']['tmp_name'], $path)) $my_file = $path;
            }*/


            if (!empty($_POST['file'])) {
                $path = explode(',', $_POST['file']);
                $my_file = $path;
            }
            $nameFile = "";

            $EOL = "\n"; // ограничитель строк, некоторые почтовые сервера требуют \n - подобрать опытным путём
            $boundary = "--" . md5(uniqid(time()));  // строка разделитель.
            $filepart = '';

            if (!empty($my_file)) {
                foreach ($my_file as $key => $filesData) {
                    $path = $filesData;
                    if ($path) {
                        $fp = fopen($path, "rb");
                        if (!$fp) {
                            print "Cannot open file";
                            exit();
                        }
                        $file = fread($fp, filesize($path));
                        fclose($fp);
                        $name = basename($filesData);
//							$filetype = $filesData['type'];
                        $filepart .= "$EOL--$boundary$EOL";
                        $filepart .= "Content-Disposition: attachment; filename=\"$name\"$EOL";
//							$filepart .= "Content-Type: $filetype; name=\"$name\"$EOL";
                        $filepart .= "Content-Transfer-Encoding: base64$EOL";
                        $filepart .= $EOL; // разделитель между заголовками и телом прикрепленного файла
                        $filepart .= chunk_split(base64_encode($file));
                    }
                }
            }
            $message = 'Имя: ' . $name . '<br>';
            if ($phone) {
                $message .= 'Телефон: ' . $phone . '<br>';
            }
            if ($service) {
                $message .= 'Услуга: ' . $service . '<br>';
            }
            $message .= 'E-mail: ' . $email . '<br>';
            if ($skype) {
                $message .= 'Skype: ' . $skype . '<br>';
            }
            if ($specialty) {
                $message .= 'Специальность: ' . $specialty . '<br>';
            }
            if ($city) {
                $message .= 'Город: ' . $city . '<br>';
            }
            $message .= 'Сообщение: ' . $text . '<br>';
//		$message .= 'Файл: ' . $my_file . '<br>';
            if (!empty($my_file)) {
                if (is_array($my_file)) {
                    foreach ($my_file as $key => $value) {
                        $nameFile .= basename($value) . ";";
                    }

                    $message .= 'Файлы: ' . $nameFile . '<br>';
                } else {
                    $nameFile .= basename($my_file[0]);
                    $message .= 'Файл: ' . $nameFile . '<br>';
                }
            }

            $message .= "Content-Transfer-Encoding: base64\n\n" .
                $filepart . "\n\n";

//			if ( mail( $adminEmail,($subject) ? $subject : 'Заявка на обратный звонок',$message,'content-type: text/html' ) )
            Yii::$app->mailer->useFileTransport = false;
            if (Yii::$app->mailer->compose()
                ->setFrom(['info@web-artcraft.com' => 'Письмо с сайта web-artcraft.com'])
                ->setTo($adminEmail)
                ->setSubject($subject ?? 'Заявка на обратный звонок')
                ->setTextBody($message)
                ->setHtmlBody('<b>' . $message . '</b>')
                ->send()
            ) {
                $result = [
                    'result' => 'success',
                    'message' => 'Ваше сообщение успешно отправлено'
                ];
            } else {
                $result = [
                    'result' => 'error',
                    'message' => 'Возникла ошибка при отправке сообщения. Попробуйте позже'
                ];
            }
            // возвращаем результат
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

//				json_encode($result);
            return $result;
        }
        return false;
    }
}