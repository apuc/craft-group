<?php

namespace frontend\modules\portfolio\controllers;

use common\models\KeyValue;
use frontend\models\TagsOpengraph;
use frontend\modules\portfolio\models\Portfolio;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use common\models\BlogSlider;

/**
 * PortfolioController implements the CRUD actions for Portfolio model.
 */
class PortfolioController extends Controller
{

	/**
	 * Lists all Portfolio models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		$portfolio = Yii::$app->cache->getOrSet("portfolio_main", function () {
			return Portfolio::find()
				->where(['!=', 'h1', 'all'])
				->andWhere(['!=', 'h1', 'brief'])
				->limit(12)
				->all();
		});
		$title = Yii::$app->cache->getOrSet("portfolio_page_meta_title", function () {
			return KeyValue::getValue('portfolio_page_meta_title');
		});
		$key = Yii::$app->cache->getOrSet("portfolio_page_meta_key", function () {
			return KeyValue::getValue('portfolio_page_meta_key');
		});
		$desc = Yii::$app->cache->getOrSet("portfolio_page_meta_desc", function () {
			return KeyValue::getValue('portfolio_page_meta_desc');
		});
		$count = Yii::$app->cache->getOrSet("portfolio_count", function () {
			return KeyValue::getValue('portfolio_count');
		});
		if (!$count) {
			$count = 5;
		};


		\Yii::$app->view->registerMetaTag([
			'name' => 'description',
			'content' => $desc,
		]);
		\Yii::$app->view->registerMetaTag([
			'name' => 'keywords',
			'content' => $key,
		]);

		TagsOpengraph::findOne(['key'=>'portfolio'])->registerOGTags(Url::to(['/portfolio']));

		return $this->render('index', [
			'portfolio' => $portfolio, 'title' => $title, 'count' => $count,
		]);
	}

	public function actionSinglePortfolio($slug)
	{
		$portfolio = Yii::$app->cache->getOrSet('portfolio-' . $slug, function () use ($slug) {
			return Portfolio::find()
				->where(['slug' => $slug])
				->asArray()
				->one();
		});

		Yii::$app->og->registerTags(
			$portfolio['title'],
			strip_tags($portfolio['meta_desc']),
			$portfolio['file'],
			Url::to(['single-portfolio', 'slug'=>$slug], true)
		);

		if ($portfolio) {
			return $this->render('single-portfolio', ['portfolio' => $portfolio]);
		} else {
			return $this->redirect(['/' . $slug]);
		}
	}

	public function actionMore()
	{
		if (isset($_POST)) {
			$get_more = Yii::$app->cache->getOrSet("portfolio_more", function () {
				return KeyValue::getValue('portfolio_more');
			});
			$offset = ($_POST['inpage'] * $_POST['page']) - $_POST['inpage'];
			$more = Portfolio::find()
				->where(['!=', 'h1', 'all'])
				->andWhere(['!=', 'h1', 'brief'])
				->offset($offset)
				->limit(($get_more) ? $get_more : $_POST['inpage'])
				->all();
		}

		return $this->render('more-portfolio', ['more' => $more]);
	}
}
