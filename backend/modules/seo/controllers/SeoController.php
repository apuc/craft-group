<?php

namespace backend\modules\seo\controllers;

use Yii;
use common\models\KeyValue;
use backend\modules\seo\controllers\SeoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * SeoController implements the CRUD actions for KeyValue model.
 */
class SeoController extends Controller
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
			            'actions' => ['@'],
			            'allow' => true,
			            'roles' => ['@'],
		            ],
	            ],
            ],
        ];
    }

    /**
     * Lists all KeyValue models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SeoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
	
	public function actionPage($slug)
	{
		$searchModel = new SeoSearch();
		$searchModel->key = $slug;
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		return $this->render('index', [
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider,
		]);
	}

    /**
     * Displays a single KeyValue model.
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
     * Creates a new KeyValue model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
    	$model = new KeyValue();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing KeyValue model.
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
     * Deletes an existing KeyValue model.
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
     * Finds the KeyValue model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return KeyValue the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = KeyValue::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('seo', 'The requested page does not exist.'));
    }
	
	public function actionCreateTitle($slug)
	{
		$model = new KeyValue();
		
		return $this->render('_form', [
			'model' => $model, 'key' => $slug.'_page_meta_title'
		]);
	}
	
	public function actionCreateDesc($slug)
	{
		$model = new KeyValue();
		
		return $this->render('_form', [
			'model' => $model, 'key' => $slug.'_page_meta_desc'
		]);
	}
	
	public function actionCreateKey($slug)
	{
		$model = new KeyValue();
		
		return $this->render('_form', [
			'model' => $model, 'key' => $slug.'_page_meta_key'
		]);
	}
	
	public function actionCreateOgTitle($slug)
	{
		$model = new KeyValue();
		
		return $this->render('_form', [
			'model' => $model, 'key' => $slug.'_og_title'
		]);
	}
	
	public function actionCreateOgDesc($slug)
	{
		$model = new KeyValue();
		
		return $this->render('_form', [
			'model' => $model, 'key' => $slug.'_og_description'
		]);
	}
	
	public function actionCreateOgType($slug)
	{
		$model = new KeyValue();
		
		return $this->render('_form', [
			'model' => $model, 'key' => $slug.'_og_type'
		]);
	}
	
	public function actionCreateOgUrl($slug)
	{
		$model = new KeyValue();
		
		return $this->render('_form', [
			'model' => $model, 'key' => $slug.'_og_url'
		]);
	}
	
	public function actionCreateOgImage($slug)
	{
		$model = new KeyValue();
		
		return $this->render('_form', [
			'model' => $model, 'key' => $slug.'_og_image', 'type' => 'img'
		]);
	}
	
	public function actionCreateOgSiteName($slug)
	{
		$model = new KeyValue();
		
		return $this->render('_form', [
			'model' => $model, 'key' => $slug.'_og_site_name'
		]);
	}
	
	public function actionCreateInPagePortfolio($slug)
	{
		$model = new KeyValue();
		
		return $this->render('_form', [
			'model' => $model, 'key' => $slug.'_count'
		]);
	}
	
	public function actionSave() {
    	if(isset($_POST['KeyValue']['key'])){
		    $model = new KeyValue();
    		$key = $_POST['KeyValue']['key'];
    		$val = $_POST['KeyValue']['value'];
    		if(KeyValue::setValue($key, $val)) {
			    \Yii::$app->session->addFlash( 'success','Информация обновлена' );
			    return $this->render( '_form',[
				    'model' => $model,
				    'key'   => $key
			    ] );
		    } else {
			    \Yii::$app->session->addFlash('error', 'Ошибка! Или не верно введены данные!');
			    return $this->render( '_form',[
				    'model' => $model,
				    'key'   => $key
			    ] );
		    }
	    }
	    return false;
	}
 
}
