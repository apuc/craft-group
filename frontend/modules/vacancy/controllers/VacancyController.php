<?php

namespace frontend\modules\vacancy\controllers;

use common\models\KeyValue;
use frontend\models\TagsOpengraph;
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

		TagsOpengraph::findOne(['key' => 'vacancy'])->registerOGTags(Url::to(['/vacancy']));

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

		Yii::$app->og->registerTags(
			$vacancy->title,
			$vacancy->meta_desc,
			$vacancy->img,
			Url::to(['/single-vacancy', 'slug' => $slug])
		);

		return $this->render('single-vacancy', ['vacancy' => $vacancy, 'all' => $all_vacancy]);
	}
}
