<?php

namespace frontend\modules\service\controllers;

use backend\modules\service\models\Service;
use common\models\Feedback;
use common\models\KeyValue;
use common\models\Portfolio;
use frontend\assets\AppAsset;
use Yii;
use yii\helpers\Url;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\BlogSlider;

/**
 * ServiceController implements the CRUD actions for Service model.
 */
class ServiceController extends Controller
{
	/**
	 * @inheritdoc
	 */
	public function behaviors()
	{
		return [
			'verbs' => [
				'class' => VerbFilter::className(),
				'actions' => [
					'delete' => ['POST'],
				],
			],
		];
	}

	/**
	 * Lists all Service models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		$service = Yii::$app->cache->getOrSet("service_main", function () {
			return Service::find()->where(['options' => 1])->limit(7)->all();
		});
		$services = Yii::$app->cache->getOrSet("services_main", function () {
			return Service::find()->where(['options' => 2])->orderBy(['position' => SORT_ASC])->limit(7)->all();
		});
		$title = Yii::$app->cache->getOrSet("service_page_meta_title", function () {
			return KeyValue::getValue('service_page_meta_title');
		});
		$key = Yii::$app->cache->getOrSet("service_page_meta_key", function () {
			return KeyValue::getValue('service_page_meta_key');
		});
		$desc = Yii::$app->cache->getOrSet("service_page_meta_desc", function () {
			return KeyValue::getValue('service_page_meta_desc');
		});
		\Yii::$app->view->registerMetaTag([
			'name' => 'description',
			'content' => $desc,
		]);
		\Yii::$app->view->registerMetaTag([
			'name' => 'keywords',
			'content' => $key,
		]);
		Yii::$app->opengraph->title = Yii::$app->cache->getOrSet("service_og_title", function () {
			return KeyValue::getValue('service_og_title');
		});
		Yii::$app->opengraph->description = Yii::$app->cache->getOrSet("service_og_description", function () {
			return KeyValue::getValue('service_og_description');
		});
		Yii::$app->opengraph->image = Yii::$app->cache->getOrSet("service_og_image", function () {
			return KeyValue::getValue('service_og_image');
		});
		Yii::$app->opengraph->url = Yii::$app->cache->getOrSet("service_og_url", function () {
			return KeyValue::getValue('service_og_url');
		});
		Yii::$app->opengraph->siteName = Yii::$app->cache->getOrSet("service_og_site", function () {
			return KeyValue::getValue('service_og_site_name');
		});
		Yii::$app->opengraph->type = Yii::$app->cache->getOrSet("service_og_type", function () {
			return KeyValue::getValue('service_og_type');
		});
		return $this->render('index', [
			'service' => $service, 'all' => $services, 'title' => $title
		]);
	}

	public function actionSingleService($slug)
	{
		$service = Yii::$app->cache->getOrSet('service-single-service-' . $slug, function () use ($slug) {
			return Service::find()->where(['slug' => $slug])->one();
		});
		$services = Yii::$app->cache->getOrSet('services-single-service-' . $slug, function () {
			return Service::find()->where(['options' => 2])->limit(4)->all();
		});
		Yii::$app->opengraph->title = $service['title'];
		Yii::$app->opengraph->description = $service['description'];
		Yii::$app->opengraph->image = $service['img'];
		Yii::$app->opengraph->url = Url::home('https') . 'service/' . $slug;
		Yii::$app->opengraph->siteName = Yii::$app->name;
		Yii::$app->opengraph->type = 'article';
		if ($service) {
			return $this->render('single-service', ['service' => $service, 'services' => $services]);
		} else {
			return $this->redirect(['/' . $slug]);
		}

	}

}
