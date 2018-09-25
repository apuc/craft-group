<?php

namespace frontend\modules\about\controllers;

use common\models\KeyValue;
use frontend\models\TagsOpengraph;
use Yii;
use common\models\About;
use yii\helpers\Url;
use yii\web\Controller;

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

		TagsOpengraph::findOne(['key' => 'about'])->registerOGTags(Url::to(['/about'], true));

		return $this->render('index', [
			'about' => $about, 'title' => $title
		]);
	}
}
