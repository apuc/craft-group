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

class SendForm extends Model{
	
	static public function sendMail() {
		if ( $_POST ) {
			// обрабатываем запрос
			$adminEmail = Yii::$app->params['adminEmail'];
//				$adminEmail = get_option('admin_email');
			$name      = $_POST['name'];
			$phone     = $_POST['phone'];
			$email     = $_POST['email'];
			$skype     = $_POST['skype'];
			$city      = $_POST['city'] ?? '';
			$specialty = $_POST['specialty'] ?? '';
			$subject   = $_POST['subject'] ?? '';
			$service   = $_POST['service'] ?? '';
			$text      = $_POST['text'];
			$my_file   = "";
			/*if (!empty($_FILES['file']['tmp_name'])) {
				$path = $_FILES['file']['name'];
				if (copy($_FILES['file']['tmp_name'], $path)) $my_file = $path;
			}*/
			
			
			if ( ! empty( $_POST['file'] ) ) {
				$path    = explode( ',',$_POST['file'] );
				$my_file = $path;
			}
			$nameFile = "";
			
			$EOL      = "\n"; // ограничитель строк, некоторые почтовые сервера требуют \n - подобрать опытным путём
			$boundary = "--" . md5( uniqid( time() ) );  // строка разделитель.
			$filepart = '';
			
			if ( ! empty( $my_file ) ) {
				foreach ( $my_file as $key => $filesData ) {
					$path = $filesData;
					if ( $path ) {
						$fp = fopen( $path,"rb" );
						if ( ! $fp ) {
							print "Cannot open file";
							exit();
						}
						$file = fread( $fp,filesize( $path ) );
						fclose( $fp );
						$name = basename( $filesData );
//							$filetype = $filesData['type'];
						$filepart .= "$EOL--$boundary$EOL";
						$filepart .= "Content-Disposition: attachment; filename=\"$name\"$EOL";
//							$filepart .= "Content-Type: $filetype; name=\"$name\"$EOL";
						$filepart .= "Content-Transfer-Encoding: base64$EOL";
						$filepart .= $EOL; // разделитель между заголовками и телом прикрепленного файла
						$filepart .= chunk_split( base64_encode( $file ) );
					}
				}
			}
			$message = 'Имя: ' . $name . '<br>';
			if ( $phone ) {
				$message .= 'Телефон: ' . $phone . '<br>';
			}
			if ( $service ) {
				$message .= 'Услуга: ' . $service . '<br>';
			}
			$message .= 'E-mail: ' . $email . '<br>';
			if ( $skype ) {
				$message .= 'Skype: ' . $skype . '<br>';
			}
			if ( $specialty ) {
				$message .= 'Специальность: ' . $specialty . '<br>';
			}
			if ( $city ) {
				$message .= 'Город: ' . $city . '<br>';
			}
			$message .= 'Сообщение: ' . $text . '<br>';
//		$message .= 'Файл: ' . $my_file . '<br>';
			if ( ! empty( $my_file ) ) {
				if ( is_array( $my_file ) ) {
					foreach ( $my_file as $key => $value ) {
						$nameFile .= basename( $value ) . ";";
					}
					
					$message .= 'Файлы: ' . $nameFile . '<br>';
				} else {
					$nameFile .= basename( $my_file[0] );
					$message  .= 'Файл: ' . $nameFile . '<br>';
				}
			}
			
			$message .= "Content-Transfer-Encoding: base64\n\n" .
			            $filepart . "\n\n";
			
//			if ( mail( $adminEmail,($subject) ? $subject : 'Заявка на обратный звонок',$message,'content-type: text/html' ) )
			Yii::$app->mailer->useFileTransport = false;
			if ( Yii::$app->mailer->compose()
			                      ->setFrom( [ 'info@web-artcraft.com' => 'Письмо с сайта web-artcraft.com' ] )
			                      ->setTo( $adminEmail )
			                      ->setSubject( $subject ?? 'Заявка на обратный звонок' )
			                      ->setTextBody( $message )
			                      ->setHtmlBody( '<b>' . $message . '</b>' )
			                      ->send() ) {
				$result = [
					'result'  => 'success',
					'message' => 'Ваше сообщение успешно отправлено'
				];
			} else {
				$result = [
					'result'  => 'error',
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