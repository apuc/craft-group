<?php

namespace frontend\modules\blog\controllers;

use common\models\BlogSlider;
use common\models\KeyValue;
use frontend\modules\blog\models\Blog;
use Yii;
use yii\helpers\Url;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\db\Expression;

/**
 * BlogController implements the CRUD actions for BlogSlider model.
 */
class BlogController extends Controller
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
	 * Lists all BlogSlider models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		$dataProvider = new ActiveDataProvider([
			'query' => BlogSlider::find(),
		]);
		$blog = Yii::$app->cache->getOrSet("blog", function () {
			return Blog::find()->where(['!=', 'options', 0])->andWhere(['!=', 'h1', 'current'])->orderBy(['date' => SORT_DESC])->all();
		});
		$title = Yii::$app->cache->getOrSet("blog_page_meta_tilte", function () {
			return KeyValue::getValue('blog_page_meta_title');
		});
		$key = Yii::$app->cache->getOrSet("blog_page_meta_key", function () {
			return KeyValue::getValue('blog_page_meta_key');
		});
		$desc = Yii::$app->cache->getOrSet("blog_page_meta_desc", function () {
			return KeyValue::getValue('blog_page_meta_desc');
		});
		\Yii::$app->view->registerMetaTag([
			'name' => 'description',
			'content' => $desc,
		]);
		\Yii::$app->view->registerMetaTag([
			'name' => 'keywords',
			'content' => $key,
		]);
		Yii::$app->opengraph->title = Yii::$app->cache->getOrSet("blog_og_title", function () {
			return KeyValue::getValue('blog_og_title');
		});
		Yii::$app->opengraph->description = Yii::$app->cache->getOrSet("blog_og_desc", function () {
			return KeyValue::getValue('blog_og_description');
		});
		Yii::$app->opengraph->image = Yii::$app->cache->getOrSet("blog_og_image", function () {
			return KeyValue::getValue('blog_og_image');
		});
		Yii::$app->opengraph->url = Yii::$app->cache->getOrSet("blog_og_url", function () {
			return KeyValue::getValue('blog_og_url');
		});
		Yii::$app->opengraph->siteName = Yii::$app->cache->getOrSet("blog_og_site_name", function () {
			return KeyValue::getValue('blog_og_site_name');
		});
		Yii::$app->opengraph->type = Yii::$app->cache->getOrSet("blog_og_type", function () {
			return KeyValue::getValue('blog_og_type');
		});
		$count = Yii::$app->cache->getOrSet("blog_count", function () {
			return KeyValue::getValue('blog_count');
		});
		if (!$count) {
			$count = 5;
		};

		return $this->render('index', [
			'dataProvider' => $dataProvider, 'blog' => $blog, 'title' => $title, 'count' => $count,
		]);
	}

	public function actionSingleBlog($slug)
	{
		$blog = Yii::$app->cache->getOrSet('blog-' . $slug, function () use ($slug) {
			return BlogSlider::find()->where(['slug' => $slug])->one();
		});
		$last_arr =[];
		$last_blog = BlogSlider::find()->where(['!=', 'h1', 'current'])->andWhere(['!=', 'slug', $slug])->orderBy(['date' => SORT_DESC])->limit(5)->orderBy('date desc')->all();
		foreach ($last_blog as $last){
			$last_arr[] = $last->slug;
		}
		$count_sidebar = KeyValue::getValue('blog_sidebar_count') ?? '';
		if(!$count_sidebar) {
			$count_sidebar = BlogSlider::find()->where(['!=', 'h1', 'current'])->count();
		}
		$slider = Yii::$app->cache->getOrSet('slider-' . $slug, function () use ($slug, $last_arr, $count_sidebar) {
			return BlogSlider::find()
				->where(['!=', 'options', 0])
				->andWhere(['!=','h1', 'current'])
				->andWhere(['!=', 'slug', $slug])
				->andWhere(['not in', 'slug', $last_arr])
				->orderBy(new Expression('rand()'), ['date'=> SORT_DESC])
				->limit($count_sidebar)
				->all();
		});
		$all = Yii::$app->cache->getOrSet('all' . $slug, function () {
			return BlogSlider::find()->where(['h1' => 'current'])->one();
		});
		Yii::$app->opengraph->title = $blog->title;
		Yii::$app->opengraph->description = $blog->description;
		Yii::$app->opengraph->image = $blog->file;
		Yii::$app->opengraph->url = Url::home('https') . 'blog/' . $slug;
		Yii::$app->opengraph->siteName = Yii::$app->name;
		Yii::$app->opengraph->type = 'article';
		if($blog) {
			return $this->render('single-blog', ['blog' => $blog, 'slider' => $slider, 'all' => $all ]);
		} else {
			return $this->redirect(['/'.$slug]);
		}
	}
	
	public function actionMore()
	{
		if (isset($_POST)) {
			$get_more = Yii::$app->cache->getOrSet("blog_more", function () {
				return KeyValue::getValue('blog_more');
			});
			$offset = ($_POST['inpage'] * $_POST['page']) - $_POST['inpage'];
			$more = BlogSlider::find()
			                  ->where(['!=', 'h1', 'all'])
			                  ->andWhere(['!=', 'h1', 'brief'])
			                  ->offset($offset)
			                  ->limit(($get_more) ? $get_more : $_POST['inpage'])
			                  ->all();
		}
		
		return $this->render('more-blog', ['more' => $more]);
	}
	
}
