<?php

namespace frontend\modules\portfolio\controllers;

use common\models\KeyValue;
use Yii;
use backend\modules\portfolio\models\Portfolio;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
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
	    $blog = BlogSlider::find()->where(['!=', 'h1', 'current'])->orderBy(['date'=> SORT_DESC])->asArray()->all();
	    $b_cur = BlogSlider::find()->where(['h1' => 'current'])->one();
    	$dataProvider = new ActiveDataProvider([
            'query' => Portfolio::find(),
        ]);
        $portfolio = Portfolio::find()
                              ->where(['!=', 'h1', 'all'])
                              ->andWhere(['!=', 'h1', 'brief'])
                              ->asArray()
                              ->all();
	    $title = KeyValue::getValue('portfolio_page_meta_title');
	    $key = KeyValue::getValue('portfolio_page_meta_key');
	    $desc = KeyValue::getValue('portfolio_page_meta_desc');
	    $count = KeyValue::getValue('portfolio_count');
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
	    Yii::$app->opengraph->title = KeyValue::getValue('portfolio_og_title');
	    Yii::$app->opengraph->description = KeyValue::getValue('portfolio_og_description');
	    Yii::$app->opengraph->image = KeyValue::getValue('portfolio_og_image');
	    Yii::$app->opengraph->url = KeyValue::getValue('portfolio_og_url');
	    Yii::$app->opengraph->siteName = KeyValue::getValue('portfolio_og_site_name');
	    Yii::$app->opengraph->type = KeyValue::getValue('portfolio_og_type');
        return $this->render('index', [
            'dataProvider' => $dataProvider, 'portfolio' => $portfolio, 'title' => $title, 'count' => $count, 'blog'=>$blog, 'b_cur' => $b_cur,
        ]);
    }
    
	public function actionSinglePortfolio($slug)
	{
		$blog = BlogSlider::find()->where(['!=', 'h1', 'current'])->orderBy(['date'=> SORT_DESC])->asArray()->all();
		$b_cur = BlogSlider::find()->where(['h1' => 'current'])->one();
		$portfolio = Portfolio::find()
		                      ->where(['slug'=>$slug])
		                      ->asArray()
		                      ->one();
		return $this->render('single-portfolio', ['portfolio'=>$portfolio, 'b_cur'=>$b_cur, 'blog'=>$blog]);
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
