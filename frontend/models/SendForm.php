<?php
/**
 * Created by PhpStorm.
 * User: Neo
 * Date: 17.04.2018
 * Time: 9:33
 */

namespace frontend\models;

use Yii;
use yii\web\Response;
use yii\base\Model;

class SendForm extends Model
{

    const VACANCY = 'Заявка на вакансию';
    const USULUGI = 'Заявка на услугу';

    public $name;
    public $phone;
    public $email;
    public $skype;
    public $message;
    public $subject;
    public $radioListForm;

    public $radioList;

    public function rules()
    {
        return [
            [['name', 'phone', 'email', 'skype', 'message', 'subject'], 'string'],
            [['name', 'phone', 'email'], 'required', 'message' => "Неверно заполненое поле"],
            [['email'], 'email', 'message' => "Неверно заполненое поле"],
            [['phone'], 'phoneLength'],
            [['radioListForm'], 'safe']
        ];
    }

    public function attributeLabels()
    {
        return [
            "name" => "Ваше имя, фамилия *",
            "phone" => "Ваш номер телефона *",
            "email" => "Ваш e-mail *",
            "skype" => "Ваш skype",
        ];
    }

    public function setRadioList()
    {
        $this->radioList = [
            0 => 'Готовое решение',
            1 => 'Интернет-магазин',
            2 => 'Индивидуальный проект',
            3 => 'Корпоративные системы',
            4 => 'Landing page',
            5 => 'UI/UX Design',
            6 => 'Поддержка',
            7 => 'Логотип',
            8 => 'Репутационный маркетинг',
            9 => 'Полиграфическая продукция',
            10 => 'Брендинг и айдентика',
            11 => 'Digital Design'
        ];
    }

    public function setRadioListForm()
    {
        $this->setRadioList();
        if (!empty($this->radioListForm)) {
            foreach ($this->radioListForm as $key => $item) {
                $this->radioListForm[$key] = $this->radioList[$key];
            }
        }
    }

    public function phoneLength()
    {
        $this->phone = str_replace(array('_'), '', $this->phone);
        if (strlen($this->phone) < 16) {
            $this->addError('phone', "Неверно заполненое поле");
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