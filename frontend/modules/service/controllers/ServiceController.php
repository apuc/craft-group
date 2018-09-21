<?php

namespace frontend\modules\service\controllers;

use backend\modules\service\models\Service;
use common\models\Feedback;
use common\models\KeyValue;
use common\models\Portfolio;
use frontend\assets\AppAsset;
use frontend\models\TagsOpengraph;
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

		TagsOpengraph::findOne(['key' => 'service'])->registerOGTags(Url::to(['/service'], true));

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

		Yii::$app->og->registerTags(
			$service['title'],
			$service['meta_desc'],
			$service['img'],
			Url::to(['/single-service', 'slug' => $slug])
		);

		if ($service) {
			return $this->render('single-service', ['service' => $service, 'services' => $services]);
		} else {
			return $this->redirect(['/' . $slug]);
		}

	}

}
