<?php

namespace backend\modules\portfolio\controllers;

use backend\modules\behance\models\BehanceWork;
use Yii;
use backend\modules\portfolio\models\Portfolio;
use backend\modules\portfolio\models\PortfolioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * PortfolioController implements the CRUD actions for Portfolio model.
 */
class PortfolioController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
	            'class' => AccessControl::className(),
	            'rules' => [
		            [
			            'actions' => ['login', 'error'],
			            'allow' => true,
		            ],
		            [
			            'actions' => [],
			            'allow' => true,
			            'roles' => ['@'],
		            ],
	            ],
            ],
	        
        ];
    }


    public function actionIndex()
    {
    	$searchModel = new PortfolioSearch();
    	$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    	
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionMain($slug=NULL){

	    $searchModel = new PortfolioSearch();
    	if($slug){
		    $searchModel->options = $slug;
		    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		    $dataProvider->query->where(['!=', 'h1', 'all'])->andWhere(['!=', 'h1', 'brief'])->andWhere(['options'=>1])->limit('5')->orderBy(['id' => SORT_ASC])->all();
	    }
	
	    return $this->render('main', [
		    'searchModel' => $searchModel,
		    'dataProvider' => $dataProvider,
	    ]);
    }


    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    public function actionCreate()
    {
        $model = new Portfolio();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionCreateFromBehance($id)
    {
        $work = BehanceWork::findOne($id);

        if(!empty(Portfolio::findOne(["title"=>$work->name])))
        {
            Yii::$app->session->setFlash("error","Работа уже есть в портфолио!");
            return $this->redirect("/secureadminpage/behance/works/index");
        }

        $model = new Portfolio();
        $model->title = $work->name;
        $model->href = $work->url;
        $model->h1 = $work->name;
        $model->options = 1;

        if(!is_dir(Yii::getAlias("@frontend/web/uploads/global/Portfolio")))
        {
            mkdir(Yii::getAlias("@frontend/web/uploads/global/Portfolio"));
        }

        $extension = pathinfo($work->preview, PATHINFO_EXTENSION);
        $img = file_get_contents($work->preview);
        file_put_contents(Yii::getAlias("@frontend/web/uploads/global/Portfolio/").$work->name.".".$extension,$img);

        $model->file = "/uploads/global/Portfolio/".$work->name.".".$extension;

        return $this->render('create', [
                'model' => $model,
        ]);
    }


    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }


    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }


    protected function findModel($id)
    {
        if (($model = Portfolio::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('blog', 'The requested page does not exist.'));
    }
}
