<?php

namespace frontend\modules\myths\controllers;

use common\models\KeyValue;
use frontend\components\SidebarWidget;
use frontend\models\TagsOpengraph;
use frontend\modules\myths\models\Myths;
use Yii;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * MythsController implements the CRUD actions for Myths model.
 */
class MythsController extends Controller
{
	/**
	 * Lists all Myths models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		$myths = Yii::$app->cache->getOrSet('myths', function () {
			return Myths::find()->where(['options' => 2])->all();
		});
		
		TagsOpengraph::findOne(['key'=>'myths'])->registerOGTags(Url::to(['/myths'], true));

		return $this->render('index', [
			'myths' => $myths,
		]);
	}

	public function actionSingleMyths($slug)
	{
		/**
		 * @var Myths $myth
		 */
		$myth = Yii::$app->cache->getOrSet('myth-' . $slug, function () use ($slug) {
			return Myths::find()->where(['slug' => $slug])->one();
		});
		if ($myth) {
			new NotFoundHttpException();
		}
		$slider = SidebarWidget::widget([
			'countSidebar' => KeyValue::getValue('myths-blog-post-count', 5),
			'orderBy' => SidebarWidget::ORDER_BY_MYTHS
		]);

		Yii::$app->og->registerTags(
			$myth->title,
			strip_tags($myth->getText()),
			$myth->file,
			Url::to(['single-myths', 'slug'=>$slug], true)
		);
		
		return $this->render('single-myths', ['myth' => $myth, 'slider' => $slider]);
	}
}
