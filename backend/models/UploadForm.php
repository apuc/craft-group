<?php
/**
 * Created by PhpStorm.
 * User: Neo
 * Date: 25.01.2018
 * Time: 15:52
 */

namespace backend\models;


use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model {
	/**
	 * @var UploadedFile[]
	 */
	public $imageFile;
	public $file;
	
	public function rules()
	{
		return [
			[['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxFiles'=>4],
		];
	}
	
	public function upload($path=NULL)
	{
		
		if ($this->validate()) {
			foreach ($this->imageFile as $file){
				$file->saveAs('../../frontend/web/images/'.$path. $file->baseName . '.' . $file->extension);
			}
			return true;
		} else {
			return false;
		}
	}
}