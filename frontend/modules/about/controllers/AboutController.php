<?php

namespace frontend\modules\about\controllers;

use common\models\Feedback;
use common\models\KeyValue;
use common\models\Service;
use Yii;
use common\models\About;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\BlogSlider;

/**
 * AboutController implements the CRUD actions for About model.
 */
class AboutController extends Controller
{
	/**
	 * Lists all About models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		$about = Yii::$app->cache->getOrSet('about-index', function () {
			return About::find()->all();
		});
		$title = Yii::$app->cache->getOrSet("about_meta_title", function () {
			return KeyValue::getValue('about_page_meta_title');
		});
		$key = Yii::$app->cache->getOrSet("about_meta_key", function () {
			return KeyValue::getValue('about_page_meta_key');
		});
		$desc = Yii::$app->cache->getOrSet("about_meta_desc", function () {
			return KeyValue::getValue('about_page_meta_desc');
		});
		\Yii::$app->view->registerMetaTag([
			'name' => 'description',
			'content' => $desc,
		]);
		\Yii::$app->view->registerMetaTag([
			'name' => 'keywords',
			'content' => $key,
		]);

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

		Yii::$app->og->registerTags($titleOG, $descriptionOG, $image, $url, $siteName, $type);

		return $this->render('index', [
			'about' => $about, 'title' => $title
		]);
	}
}
