<?php

namespace frontend\modules\vacancy\controllers;

use common\models\KeyValue;
use Yii;
use common\models\Vacancy;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\BlogSlider;

/**
 * VacancyController implements the CRUD actions for Vacancy model.
 */
class VacancyController extends Controller
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
	 * Lists all Vacancy models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		$vacancy = Yii::$app->cache->getOrSet("vacancy_main", function () {
			return Vacancy::find()->where(['options' => 1])->limit(7)->all();
		});
		$all_vacancy = Yii::$app->cache->getOrSet("vacancy_all", function () {
			return Vacancy::find()->where(['options' => 2])->limit(7)->all();
		});
		$title = Yii::$app->cache->getOrSet("vacancy_page_meta_title", function () {
			return KeyValue::getValue('vacancy_page_meta_title');
		});
		$key = Yii::$app->cache->getOrSet("vacancy_page_meta_key", function () {
			return KeyValue::getValue('vacancy_page_meta_key');
		});
		$desc = Yii::$app->cache->getOrSet("vacancy_page_meta_desc", function () {
			return KeyValue::getValue('vacancy_page_meta_desc');
		});
		\Yii::$app->view->registerMetaTag([
			'name' => 'description',
			'content' => $desc,
		]);
		\Yii::$app->view->registerMetaTag([
			'name' => 'keywords',
			'content' => $key,
		]);
		Yii::$app->opengraph->title = Yii::$app->cache->getOrSet("vacancy_og_title", function () {
			return KeyValue::getValue('vacancy_og_title');
		});
		Yii::$app->opengraph->description = Yii::$app->cache->getOrSet("vacancy_og_description", function () {
			return KeyValue::getValue('vacancy_og_description');
		});
		Yii::$app->opengraph->image = Yii::$app->cache->getOrSet("vacancy_og_image", function () {
			return KeyValue::getValue('vacancy_og_image');
		});
		Yii::$app->opengraph->url = Yii::$app->cache->getOrSet("vacancy_og_url", function () {
			return KeyValue::getValue('vacancy_og_url');
		});
		Yii::$app->opengraph->siteName = Yii::$app->cache->getOrSet("vacancy_og_site_nmae", function () {
			return KeyValue::getValue('vacancy_og_site_name');
		});
		Yii::$app->opengraph->type = Yii::$app->cache->getOrSet("vacancy_og_type", function () {
			return KeyValue::getValue('vacancy_og_type');
		});
		return $this->render('index', [
			'vacancy' => $vacancy, 'all' => $all_vacancy, 'title' => $title
		]);
	}

	public function actionSingleVacancy($slug)
	{
		$vacancy = Yii::$app->cache->getOrSet('single-vacancy-' . $slug, function () use ($slug) {
			return Vacancy::find()->where(['slug' => $slug])->one();
		});
		$all_vacancy = Yii::$app->cache->getOrSet('all-vacancy-' . $slug, function () use ($vacancy) {
			return Vacancy::find()->where(['options' => 2])->limit(3)->offset($vacancy['id'])->all();
		});
		$vacancy->updateCounters(['views' => 1]);
		Yii::$app->opengraph->title = $vacancy->title;
		Yii::$app->opengraph->description = $vacancy->description;
		Yii::$app->opengraph->image = $vacancy->img;
		Yii::$app->opengraph->url = Url::home('https') . 'vacancy/' . $slug;
		Yii::$app->opengraph->siteName = Yii::$app->name;
		Yii::$app->opengraph->type = 'article';
		return $this->render('single-vacancy', ['vacancy' => $vacancy, 'all' => $all_vacancy]);
	}
}
