<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 13.09.18
 * Time: 16:08
 */

namespace console\controllers;


use common\models\BlogSlider;
use frontend\modules\portfolio\models\Portfolio;
use Yii;
use yii\console\Controller;

class CompressingImageController extends Controller
{
	public function actionCompressing()
	{
		$images = \yii\helpers\FileHelper::findFiles(Yii::getAlias('@frontend/web/uploads/'), ['only' => ['*.jpg', '*.png']]);;
		echo 'Соединяюсь с апи' . PHP_EOL;
		\Tinify\setKey("5icSKC3n65cOfj8HuORjro017kGUi7Y3");
		echo 'Сжатие картинок началось' . PHP_EOL;
		foreach ($images as $image) {
			$source = \Tinify\fromFile($image);
			$source->toFile($image);
			echo 'Сжато ' . $image . PHP_EOL;
		}
	}
}