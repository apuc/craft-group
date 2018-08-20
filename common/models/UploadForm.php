<?php
/**
 * Created by PhpStorm.
 * User: Neo
 * Date: 26.04.2018
 * Time: 13:07
 */
	
namespace common\models;


use yii\base\Model;
use yii\web\UploadedFile;
use Yii;

class UploadForm extends Model
{
	/**
	 * @var UploadedFile[]
	 */
	public $file;
	
	public function rules()
	{
		return [
			[['file'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxFiles' => 3],
		];
	}
	
	public function upload()
	{
		if ($this->validate()) {
			foreach ($this->file as $file) {
				$file->saveAs('../../frontend/web/images/new/'. $file->baseName . '.' . $file->extension);
			}
			
			return true;
		} else {
			return false;
		}
	}
}