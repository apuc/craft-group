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

    public $btn_upload_class;
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
            "skype" => "Skype",
            "site" => "Сайт"
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
        if ($file instanceof UploadedFile) {
            $modelFile = new \frontend\models\Files();
            $modelFile->name = Yii::$app->security->generateRandomString(16) . '.' . $file->extension;
            $modelFile->setExtensionId($extension, $model_id);
            $modelFile->save();
            FileHelper::createDirectory(Yii::getAlias("uploads/{$path}/"));
            $file->saveAs(Yii::getAlias("@frontend/web/uploads/{$path}/" . $modelFile->name));
        }
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
}