<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 20.09.18
 * Time: 14:09
 */

namespace frontend\components;


use common\models\Feedback;
use Yii;
use yii\base\Widget;

class FeedbackWidget extends Widget
{
	public function run()
	{
		$feedback = Yii::$app->cache->getOrSet("feedback_main", function () {
			return Feedback::find()->where(['status' => 1])->limit(6)->all();
		});

		//var_dump($feedback); die();

		return $this->render('feedback/feedback', ['feedback'=>$feedback]);
	}
}