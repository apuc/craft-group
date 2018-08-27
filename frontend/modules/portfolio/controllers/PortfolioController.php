<?php

namespace frontend\modules\portfolio\controllers;

use common\models\KeyValue;
use Yii;
use backend\modules\portfolio\models\Portfolio;
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
	public function beforeAction($action)
	{
		$this->enableCsrfValidation = false;
		return parent::beforeAction($action);
	}

    /**
     * Lists all Portfolio models.
     * @return mixed
     */
    public function actionIndex()
    {
	    $blog = Yii::$app->cache->getOrSet("portfolio_blog", function (){
		    return BlogSlider::find()->where(['!=', 'h1', 'current'])->orderBy(['date'=> SORT_DESC])->asArray()->limit(7)->all();});
	    $b_cur = BlogSlider::find()->where(['h1' => 'current'])->one();
    	$dataProvider = new ActiveDataProvider([
            'query' => Portfolio::find(),
        ]);
        $portfolio = Yii::$app->cache->getOrSet("portfolio_main", function (){
	        return Portfolio::find()
								->where(['!=', 'h1', 'all'])
								->andWhere(['!=', 'h1', 'brief'])
								->asArray()
								->limit(7)
								->all();});
	    $title = Yii::$app->cache->getOrSet("portfolio_page_meta_title", function (){
		    return KeyValue::getValue('portfolio_page_meta_title');});
	    $key = Yii::$app->cache->getOrSet("portfolio_page_meta_key", function (){
		    return KeyValue::getValue('portfolio_page_meta_key');});
	    $desc = Yii::$app->cache->getOrSet("portfolio_page_meta_desc", function (){
		    return KeyValue::getValue('portfolio_page_meta_desc');});
	    $count = Yii::$app->cache->getOrSet("portfolio_count", function (){
		    return KeyValue::getValue('portfolio_count');});
	    if(!$count){
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
	    Yii::$app->opengraph->title = Yii::$app->cache->getOrSet("portfolio_og_title", function (){
		    return KeyValue::getValue('portfolio_og_title');});
	    Yii::$app->opengraph->description = Yii::$app->cache->getOrSet("portfolio_og_description", function (){
		    return KeyValue::getValue('portfolio_og_description');});
	    Yii::$app->opengraph->image = Yii::$app->cache->getOrSet("portfolio_og_image", function (){
		    return KeyValue::getValue('portfolio_og_image');});
	    Yii::$app->opengraph->url = Yii::$app->cache->getOrSet("portfolio_og_url", function (){
		    return KeyValue::getValue('portfolio_og_url');});
	    Yii::$app->opengraph->siteName = Yii::$app->cache->getOrSet("portfolio_og_site_name", function (){
		    return KeyValue::getValue('portfolio_og_site_name');});
	    Yii::$app->opengraph->type = Yii::$app->cache->getOrSet("portfolio_og_type", function (){
		    return KeyValue::getValue('portfolio_og_type');});
        return $this->render('index', [
            'dataProvider' => $dataProvider, 'portfolio' => $portfolio, 'title' => $title, 'count' => $count, 'blog'=>$blog, 'b_cur' => $b_cur,
        ]);
    }
    
	public function actionSinglePortfolio($slug)
	{
		$blog = Yii::$app->cache->getOrSet("portfolio_single_blog", function (){
			return BlogSlider::find()->where(['!=', 'h1', 'current'])->orderBy(['date'=> SORT_DESC])->asArray()->limit(7)->all();});
		$b_cur = BlogSlider::find()->where(['h1' => 'current'])->one();
		$portfolio = Portfolio::find()
		                      ->where(['slug'=>$slug])
		                      ->asArray()
		                      ->one();
		Yii::$app->opengraph->title = $portfolio['title'];
		Yii::$app->opengraph->description = $portfolio['description'];
		Yii::$app->opengraph->image = $portfolio['file'];
		Yii::$app->opengraph->url = Url::home('https').'portfolio/'.$slug;
		Yii::$app->opengraph->siteName = Url::home('https');
		Yii::$app->opengraph->type = 'article';
		if($portfolio) {
			return $this->render('single-portfolio', ['portfolio'=>$portfolio, 'b_cur'=>$b_cur, 'blog'=>$blog]);
		} else {
			return $this->redirect(['/'.$slug]);
		}
	}
	
	public function actionMore() {
		if ( isset( $_POST ) ) {
			$offset = ( $_POST['inpage'] *  $_POST['page'] ) - $_POST['inpage'];
			$more   = Portfolio::find()
			                    ->where( [ '!=','h1','all' ] )
			                    ->andWhere( [ '!=','h1','brief' ] )
			                    ->offset( $offset )
			                    ->limit($_POST['inpage'])
			                    ->all();
		}
		
		return $this->render( 'more-portfolio',[ 'more' => $more ] );
	}
}
