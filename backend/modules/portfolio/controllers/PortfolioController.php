<?php

namespace backend\modules\portfolio\controllers;

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

    /**
     * Lists all Portfolio models.
     * @return mixed
     */
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

    /**
     * Displays a single Portfolio model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Portfolio model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
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

    /**
     * Updates an existing Portfolio model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
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

    /**
     * Deletes an existing Portfolio model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Portfolio model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Portfolio the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Portfolio::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('blog', 'The requested page does not exist.'));
    }
}
