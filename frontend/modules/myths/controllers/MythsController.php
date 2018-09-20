<?php

namespace frontend\modules\myths\controllers;

use common\models\BlogSlider;
use common\models\KeyValue;
use frontend\components\SidebarWidget;
use frontend\modules\myths\models\Myths;
use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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

		$titleOG = Yii::$app->cache->getOrSet("about_og_title", function () {
			return KeyValue::getValue('about_og_title');
		});
		$descriptionOG = Yii::$app->cache->getOrSet("about_og_desc", function () {
			return KeyValue::getValue('about_og_description');
		});
		$image = Yii::$app->cache->getOrSet("about_og_image", function () {
			return KeyValue::getValue('about_og_image');
		});
		$url = Yii::$app->cache->getOrSet("about_og_url", function () {
			return KeyValue::getValue('about_og_url');
		});
		$siteName = Yii::$app->cache->getOrSet("about_og_site_name", function () {
			return KeyValue::getValue('about_og_site_name');
		});
		$type = Yii::$app->cache->getOrSet("about_og_type", function () {
			return KeyValue::getValue('about_og_type');
		});

		return $this->render('index', [
			'myths' => $myths,
		]);
	}

	public function actionSingleMyths($slug)
	{
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
		Yii::$app->opengraph->title = $myth->title;
		Yii::$app->opengraph->description = $myth->description;
		Yii::$app->opengraph->image = $myth->file;
		Yii::$app->opengraph->url = Url::home('https') . 'blog/' . $slug;
		Yii::$app->opengraph->siteName = Yii::$app->name;
		Yii::$app->opengraph->type = 'article';
		return $this->render('single-myths', ['myth' => $myth, 'slider' => $slider]);
	}
}
