<?php

namespace frontend\modules\blog\controllers;

use common\models\KeyValue;
use frontend\modules\blog\models\Blog;
use Yii;
use yii\helpers\Url;
use backend\modules\blog_slider\models\BlogSlider;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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
        $blog = Yii::$app->cache->getOrSet("blog", function (){
	        return Blog::find()->where(['!=', 'options', 0])->andWhere(['!=','h1', 'current'])->orderBy(['date'=> SORT_DESC])->all();});
	    $b_cur = BlogSlider::find()->where(['h1' => 'current'])->one();
	    $title = Yii::$app->cache->getOrSet("blog_page_meta_tilte", function (){
		    return KeyValue::getValue('blog_page_meta_title');});
	    $key = Yii::$app->cache->getOrSet("blog_page_meta_key", function (){
		    return KeyValue::getValue('blog_page_meta_key');});
	    $desc = Yii::$app->cache->getOrSet("blog_page_meta_desc", function (){
		    return KeyValue::getValue('blog_page_meta_desc');});
	    \Yii::$app->view->registerMetaTag([
		    'name' => 'description',
		    'content' => $desc,
	    ]);
	    \Yii::$app->view->registerMetaTag([
		    'name' => 'keywords',
		    'content' => $key,
	    ]);
	    Yii::$app->opengraph->title = Yii::$app->cache->getOrSet("blog_og_title", function (){
		    return KeyValue::getValue('blog_og_title');});
	    Yii::$app->opengraph->description = Yii::$app->cache->getOrSet("blog_og_desc", function (){
		    return KeyValue::getValue('blog_og_description');});
	    Yii::$app->opengraph->image = Yii::$app->cache->getOrSet("blog_og_image", function (){
		    return KeyValue::getValue('blog_og_image');});
	    Yii::$app->opengraph->url = Yii::$app->cache->getOrSet("blog_og_url", function (){
		    return KeyValue::getValue('blog_og_url');});
	    Yii::$app->opengraph->siteName = Yii::$app->cache->getOrSet("blog_og_site_name", function (){
		    return KeyValue::getValue('blog_og_site_name');});
	    Yii::$app->opengraph->type = Yii::$app->cache->getOrSet("blog_og_type", function (){
		    return KeyValue::getValue('blog_og_type');});
	    
        return $this->render('index', [
            'dataProvider' => $dataProvider, 'blog'=> $blog, 'title' => $title, 'b_cur' => $b_cur,
        ]);
    }
    
	public function actionSingleBlog($slug)
	{
		$blog = BlogSlider::find()->where(['slug'=>$slug])->asArray()->one();
		$slider = BlogSlider::find()->where(['!=', 'options', 0])->andWhere(['!=','h1', 'current'])->anWhere(['!=', 'slug', $slug])->orderBy(['date'=> SORT_DESC])->asArray()->all();
		$all = BlogSlider::find()->where(['h1' => 'current'])->one();
		Yii::$app->opengraph->title = $blog['title'];
		Yii::$app->opengraph->description = $blog['description'];
		Yii::$app->opengraph->image = $blog['file'];
		Yii::$app->opengraph->url = Url::home('https').'blog/'.$slug;
		Yii::$app->opengraph->siteName =  Yii::$app->name;
		Yii::$app->opengraph->type = 'article';
		if($blog) {
			return $this->render('single-blog', ['blog' => $blog, 'slider' => $slider, 'all' => $all ]);
		} else {
			return $this->redirect(['/'.$slug]);
		}
	}
	
}
