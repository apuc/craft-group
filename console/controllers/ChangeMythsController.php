<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 10.09.18
 * Time: 17:26
 */

namespace console\controllers;


use common\models\Myths;
use yii\console\Controller;

class ChangeMythsController extends Controller
{
	public function actionIndex()
	{
		$myths = Myths::find()->all();
		foreach ($myths as $item){
			/**
			 * @var Myths $item
			 */
			$item->content = $item->description;
			$item->update();
		}
	}
}