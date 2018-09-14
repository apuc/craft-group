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
}