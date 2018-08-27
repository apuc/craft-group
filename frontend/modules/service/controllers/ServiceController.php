<?php

namespace frontend\modules\service\controllers;

use common\models\Feedback;
use common\models\KeyValue;
use common\models\Portfolio;
use Yii;
use common\models\Service;
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
	    $blog = Yii::$app->cache->getOrSet("service_blog", function (){
		    return BlogSlider::find()->where(['!=', 'h1', 'current'])->orderBy(['date'=> SORT_DESC])->asArray()->limit(7)->all();});
	    $b_cur = BlogSlider::find()->where(['h1' => 'current'])->one();
        $dataProvider = new ActiveDataProvider([
            'query' => Service::find(),
        ]);
        $service = Yii::$app->cache->getOrSet("service_main", function (){
	        return Service::find()->where(['options' => 1])->asArray()->limit(7)->all();});
        $services = Yii::$app->cache->getOrSet("services_main", function (){
	        return Service::find()->where(['options' => 2])->orderBy(['position' => SORT_ASC])->asArray()->limit(7)->all();});
	    $title = Yii::$app->cache->getOrSet("service_page_meta_title", function (){
		    return KeyValue::getValue('service_page_meta_title');});
	    $key = Yii::$app->cache->getOrSet("service_page_meta_key", function (){
		    return KeyValue::getValue('service_page_meta_key');});
	    $desc = Yii::$app->cache->getOrSet("service_page_meta_desc", function (){
		    return KeyValue::getValue('service_page_meta_desc');});
	    \Yii::$app->view->registerMetaTag([
		    'name' => 'description',
		    'content' => $desc,
	    ]);
	    \Yii::$app->view->registerMetaTag([
		    'name' => 'keywords',
		    'content' => $key,
	    ]);
	    Yii::$app->opengraph->title = Yii::$app->cache->getOrSet("service_og_title", function (){
		    return KeyValue::getValue('service_og_title');});
	    Yii::$app->opengraph->description = Yii::$app->cache->getOrSet("service_og_description", function (){
		    return KeyValue::getValue('service_og_description');});
	    Yii::$app->opengraph->image = Yii::$app->cache->getOrSet("service_og_image", function (){
		    return KeyValue::getValue('service_og_image');});
	    Yii::$app->opengraph->url = Yii::$app->cache->getOrSet("service_og_url", function (){
		    return KeyValue::getValue('service_og_url');});
	    Yii::$app->opengraph->siteName = Yii::$app->cache->getOrSet("service_og_site", function (){
		    return KeyValue::getValue('service_og_site_name');});
	    Yii::$app->opengraph->type = Yii::$app->cache->getOrSet("service_og_type", function (){
		    return KeyValue::getValue('service_og_type');});
        return $this->render('index', [
            'dataProvider' => $dataProvider, 'service' => $service, 'all' => $services, 'title' => $title, 'blog'=>$blog, 'b_cur' => $b_cur,
        ]);
    }
	
	public function actionSingleService($slug)
	{
		$service = Service::find()->where(['slug'=>$slug])->asArray()->one();
		$portfolio = Portfolio::find()->where(['id'=> json_decode($service['portfolio'])])->asArray()->all();
		$feedback = Feedback::find()->andWhere(['status' => 1])->andWhere(['category' => $service['id']])->asArray()->all();
		Yii::$app->opengraph->title = $service['title'];
		Yii::$app->opengraph->description = $service['description'];
		Yii::$app->opengraph->image = $service['file'];
		Yii::$app->opengraph->url = Url::home('https').'service/'.$slug;
		Yii::$app->opengraph->siteName =  Yii::$app->name;
		Yii::$app->opengraph->type = 'article';
		if($service) {
			return $this->render('single-service', ['service'=>$service, 'portfolio' => $portfolio, 'feedback' => $feedback]);
		} else {
			return $this->redirect(['/'.$slug]);
		}
		
	}
    
}
