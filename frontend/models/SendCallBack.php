<?php
/**
 * Created by PhpStorm.
 * User: Neo
 * Date: 17.04.2018
 * Time: 9:33
 */

namespace frontend\models;

use common\models\CallBack;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\FileHelper;
use yii\web\Response;
use yii\base\Model;
use yii\web\UploadedFile;

class SendCallBack extends Model {
	
	const CALLBACK = 'Обратный звонок';
	
	public $phone;
	public $dt_add;
	public $subject;
	
	public $thankMessage;
	
	public $radioList;
	
	public function rules() {
		return [
			[ [ 'phone' ],'string' ],
			[ [ 'dt_add' ],'integer' ],
			[ [ 'phone', ],'required','message' => "Неверно заполненое поле" ],
			[ [ 'phone' ],'phoneLength' ],
		];
	}
	
	/**
	 * правило валидации для поля телефона
	 */
	public function phoneLength() {
		$this->phone = str_replace( array( '_' ),'',$this->phone );
		if ( strlen( $this->phone ) < 16 ) {
			$this->addError( 'phone',"Неверно заполненое поле" );
		}
	}
	
	public function attributeLabels() {
		return [
			"phone" => "Ваш номер телефона *",
		];
	}
	
	/**
	 * @param $post [] массив с POST данными
	 * сохраняет данные после отправки формы
	 */
	public function save( $post ) {
		
		$cal_back                     = new CallBack();
		$cal_backData['CallBack'] = $post['SendCallBack'];
		$cal_back->load( $cal_backData );
		$cal_back->save();
		
		$this->thankMessage = "Спасибо за, то что выбрали нашу компанию, мы с Вами скоро свяжемся. </br>";
	}
	
	public function sendMail($message, $subject) {
		Yii::$app->mailer->compose()
		                         ->setFrom([Yii::$app->params['supportEmail'] => 'Письмо с сайта web-artcraft.com'])
		                         ->setTo([
			                         'shlykovn@mail.ru',
//					                         Yii::$app->params['adminEmail'],
		                         ])
		                         ->setSubject($subject)
//                    ->setTextBody($message)
                                 ->setHtmlBody('<b>' . $message . '</b>')
		                         ->send();
	}
	
}