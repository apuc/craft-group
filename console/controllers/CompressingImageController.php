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
	public function actionIndex()
	{
		$blogSlider = BlogSlider::findAll(['compressing_image' => Yii::$app->compressing->getCompressingOn()]);
		$portfolio = Portfolio::findAll(['compressing_image' => Yii::$app->compressing->getCompressingOn()]);
		Yii::$app->compressing->compressing(array_merge($blogSlider, $portfolio));
	}

	public function actionCompressing()
	{
		$pathImages = \yii\helpers\FileHelper::findFiles(Yii::getAlias('@frontend/web/images/'), ['only' => ['*.jpg', '*.png']]);
		$pathImg = \yii\helpers\FileHelper::findFiles(Yii::getAlias('@frontend/web/img/'), ['only' => ['*.jpg', '*.png']]);
		$images = array_merge($pathImages, $pathImg);
		echo 'Соединяюсь с апи' . PHP_EOL;
		\Tinify\setKey("nAu7aCKR7ByqlsloUkpLbAxWZZr6yuyp");
		echo 'Сжатие картинок началось' . PHP_EOL;
		foreach ($images as $image) {
			$source = \Tinify\fromFile($image);
			$source->toFile($image);
			echo 'Сжато ' . $image . PHP_EOL;
		}
	}
}