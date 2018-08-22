<?php

namespace frontend\modules\service\controllers;

use common\models\Feedback;
use common\models\KeyValue;
use common\models\Portfolio;
use Yii;
use common\models\Service;
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
	    $blog = BlogSlider::find()->where(['!=', 'h1', 'current'])->orderBy(['date'=> SORT_DESC])->asArray()->all();
	    $b_cur = BlogSlider::find()->where(['h1' => 'current'])->one();
        $dataProvider = new ActiveDataProvider([
            'query' => Service::find(),
        ]);
        $service = Service::find()->where(['options' => 1])->asArray()->all();
        $services = Service::find()->where(['options' => 2])->orderBy(['position' => SORT_ASC])->asArray()->all();
	    $title = KeyValue::getValue('service_page_meta_title');
	    $key = KeyValue::getValue('service_page_meta_key');
	    $desc = KeyValue::getValue('service_page_meta_desc');
	    \Yii::$app->view->registerMetaTag([
		    'name' => 'description',
		    'content' => $desc,
	    ]);
	    \Yii::$app->view->registerMetaTag([
		    'name' => 'keywords',
		    'content' => $key,
	    ]);
	    Yii::$app->opengraph->title = KeyValue::getValue('service_og_title');
	    Yii::$app->opengraph->description = KeyValue::getValue('service_og_description');
	    Yii::$app->opengraph->image = KeyValue::getValue('service_og_image');
	    Yii::$app->opengraph->url = KeyValue::getValue('service_og_url');
	    Yii::$app->opengraph->siteName = KeyValue::getValue('service_og_site_name');
	    Yii::$app->opengraph->type = KeyValue::getValue('service_og_type');
        return $this->render('index', [
            'dataProvider' => $dataProvider, 'service' => $service, 'all' => $services, 'title' => $title, 'blog'=>$blog, 'b_cur' => $b_cur,
        ]);
    }
	
	public function actionSingleService($slug)
	{
		$service = Service::find()->where(['slug'=>$slug])->asArray()->one();
		$portfolio = Portfolio::find()->where(['id'=> json_decode($service['portfolio'])])->asArray()->all();
		$feedback = Feedback::find()->andWhere(['status' => 1])->andWhere(['category' => $service['id']])->asArray()->all();
		if($service) {
			return $this->render('single-service', ['service'=>$service, 'portfolio' => $portfolio, 'feedback' => $feedback]);
		} else {
			return $this->redirect(['/'.$slug]);
		}
		
	}
    
}
