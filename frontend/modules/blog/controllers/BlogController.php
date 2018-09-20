<?php

namespace frontend\modules\blog\controllers;

use common\models\BlogSlider;
use common\models\KeyValue;
use frontend\components\SidebarWidget;
use frontend\modules\blog\models\Blog;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\db\Expression;
use yii\web\NotFoundHttpException;

/**
 * BlogController implements the CRUD actions for BlogSlider model.
 */
class BlogController extends Controller
{
	/**
	 * Lists all BlogSlider models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		$blog = Yii::$app->cache->getOrSet("blog", function () {
			return Blog::find()->where(['!=', 'options', 0])->andWhere(['!=', 'h1', 'current'])->orderBy(['date' => SORT_DESC])->limit(Blog::COUNT_SHOW_POST)->all();
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
		$titleOG = Yii::$app->cache->getOrSet("blog_og_title", function () {
			return KeyValue::getValue('blog_og_title');
		});
		$descriptionOG = Yii::$app->cache->getOrSet("blog_og_desc", function () {
			return KeyValue::getValue('blog_og_description');
		});
		$image = Yii::$app->cache->getOrSet("blog_og_image", function () {
			return KeyValue::getValue('blog_og_image');
		});
		$url = Yii::$app->cache->getOrSet("blog_og_url", function () {
			return KeyValue::getValue('blog_og_url');
		});
		$siteName = Yii::$app->cache->getOrSet("blog_og_site_name", function () {
			return KeyValue::getValue('blog_og_site_name');
		});
		$type = Yii::$app->cache->getOrSet("blog_og_type", function () {
			return KeyValue::getValue('blog_og_type');
		});
		Yii::$app->og->registerTags($titleOG, $descriptionOG, $image, $url, $siteName, $type);

		return $this->render('index', [
			'blog' => $blog, 'title' => $title
		]);
	}

	public function actionSingleBlog($slug)
	{
		/**
		 * @var BlogSlider $blog
		 */
		$blog = Yii::$app->cache->getOrSet('blog-' . $slug, function () use ($slug) {
			return BlogSlider::find()->where(['slug' => $slug])->one();
		});
		if (is_null($blog)) {
			throw  new NotFoundHttpException('Страница не найдена', 404);
		}
		$last_blog = BlogSlider::find()->where(['!=', 'h1', 'current'])->andWhere(['!=', 'slug', $slug])->orderBy(['date' => SORT_DESC])->limit(5)->orderBy('date desc')->all();

		$slider = SidebarWidget::widget([
			'slug' => $slug,
			'lastArr' => ArrayHelper::getColumn($last_blog, 'slug'),
			'countSidebar' => KeyValue::getValue('blog_sidebar_count', 5),
			'orderBy' => SidebarWidget::ORDER_BY_BLOG
		]);

		$title = $blog->title;
		$description = $blog->strCrop(220);
		$image = Url::to($blog->file, true);
		$url = Url::home('https') . 'blog/' . $slug;
		$siteName = Yii::$app->name;
		$type = 'article';
		Yii::$app->og->registerTags($title, $description, $image, $url, $siteName, $type);

		if ($blog) {
			return $this->render('single-blog', ['blog' => $blog, 'slider' => $slider]);
		} else {
			return $this->redirect(['/' . $slug]);
		}
	}

	public function actionMore()
	{
		if (Yii::$app->request->isAjax && Yii::$app->request->isPost) {
			$page = Yii::$app->request->post('page');
			$offset = Blog::COUNT_SHOW_POST + (Blog::COUNT_UPLOAD_POST * $page);
			$more = Blog::find()
				->where(['!=', 'options', 0])
				->andWhere(['!=', 'h1', 'current'])
				->orderBy(['date' => SORT_DESC])
				->offset($offset)
				->limit(Blog::COUNT_UPLOAD_POST)
				->all();
			$img = '_img-ajax';
			return $this->renderAjax('_blog', ['blog' => $more, 'img' => $img]);
		}
	}

	private function setOpengraph($title, $description, $image, $url, $siteName, $type)
	{

	}
}
