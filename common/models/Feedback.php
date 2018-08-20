<?php

namespace common\models;

use himiklab\sitemap\behaviors\SitemapBehavior;
use Yii;
use yii\helpers\Url;
use yii\web\UploadedFile;
use yii\base\Model;

/**
 * This is the model class for table "feedback".
 *
 * @property int $id
 * @property string $title
 * @property string $h1
 * @property string $meta_key
 * @property string $meta_desc
 * @property string $description
 * @property string $file
 * @property string $href
 * @property string $city
 * @property string $email
 * @property string $name
 * @property string $site
 * @property string $category
 * @property string $date
 * @property string $status
 */
class Feedback extends \yii\db\ActiveRecord
{
	/**
	 * @var UploadedFile
	 */
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'feedback';
	}
	
	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['title', 'category', 'status'], 'required'],
			[['description', 'file', 'href'], 'string'],
			[['h1', 'meta_key', 'meta_desc', 'description', 'file', 'href', 'city', 'email', 'name', 'site','date'], 'safe'],
			[['title', 'h1', 'meta_key', 'meta_desc', 'city', 'email', 'name', 'site', 'category'], 'string', 'max' => 255],
//			[['file'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxFiles' => 3],
		];
	}
	
	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => Yii::t('feedback', 'ID'),
			'title' => Yii::t('feedback', 'Title'),
			'h1' => Yii::t('feedback', 'H1'),
			'meta_key' => Yii::t('feedback', 'Meta Key'),
			'meta_desc' => Yii::t('feedback', 'Meta Desc'),
			'description' => Yii::t('feedback', 'Description'),
			'file' => Yii::t('feedback', 'File'),
			'href' => Yii::t('feedback', 'Href'),
			'city' => Yii::t('feedback', 'City'),
			'email' => Yii::t('feedback', 'Email'),
			'name' => Yii::t('feedback', 'Name'),
			'site' => Yii::t('feedback', 'Site'),
			'category' => Yii::t('feedback', 'Category'),
			'status' => Yii::t('feedback', 'Status'),
			'date' => Yii::t('feedback', 'Date'),
		];
	}
	
	public function sendMail()
	{
		if ( $_POST ) {
			// обрабатываем запрос
			$adminEmail = Yii::$app->params['adminEmail'];
			$name    = $_POST['Feedback']['name'];
			$email   = $_POST['Feedback']['email'];
			$city    = $_POST['Feedback']['city'];
			$category = Service::find()->where(['id'=>$_POST['Feedback']['category']])->one();
			$site = $_POST['Feedback']['site'];
			$subject = 'Отзыв';
			$text    = $_POST['Feedback']['description'];
			$my_file = "";
			if ( ! empty( $_FILES['Feedback']['tmp_name']['file'] ) ) {
				if(is_array($_FILES['Feedback']['tmp_name']['file'])) {
					$my_file = $_FILES['Feedback']['name']['file'];
				}
			}
			$nameFile = "";
			$filepart = '';
			$message = 'Имя: ' . $name . '<br>';
			$message .= 'E-mail: ' . $email . '<br>';
			$message .= 'Категория: ' . $category['title'] . '<br>';
			$message .= 'Сайт: ' . $site . '<br>';
			if($city)$message .= 'Город: ' . $city . '<br>';
			$message .= 'Сообщение: ' . $text . '<br>';
			if ( is_array( $my_file ) ) {
				foreach ( $my_file as $key => $value ) {
					$nameFile .= basename( $value ) . ";";
				}
				$message .= 'Файлы: ' . $nameFile . '<br>';
			} else {
				$nameFile .= basename( $my_file[0] );
				$message  .= 'Файл: ' . $nameFile . '<br>';
			}
			$message .= "Content-Transfer-Encoding: base64\n\n" .
			            $filepart . "\n\n";
			
			if ( mail( $adminEmail,($subject) ? $subject : 'Заявка на обратный звонок',$message,'content-type: text/html' ) ) {
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
			return $result;
		}
	}
	
	public function beforeSave( $insert ) {
		if (Yii::$app->request->isAjax) {
			if ( parent::beforeSave( $insert ) ) {
				$model = new Feedback();
				$files = new UploadForm();
				
				if (Yii::$app->request->isPost) {
					$files->file = UploadedFile::getInstances($model, 'file');
					$this->file = '';
					if ($files->upload()) {
						foreach ($files->file as $file){
							if(!is_array($file)){
								$this->file .= '<img src="/frontend/web/images/new/'. $file->baseName . '.' . $file->extension.'">';
							}
							
						}
					}
				}
		}
			return true;
		}
		return parent::beforeSave( $insert );
	}
}
