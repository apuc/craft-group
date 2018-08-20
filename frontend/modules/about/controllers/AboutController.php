<?php

namespace frontend\modules\about\controllers;

use common\models\Feedback;
use common\models\KeyValue;
use common\models\Service;
use Yii;
use common\models\About;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\BlogSlider;

/**
 * AboutController implements the CRUD actions for About model.
 */
class AboutController extends Controller
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
     * Lists all About models.
     * @return mixed
     */
    public function actionIndex()
    {
	    $blog = BlogSlider::find()->where(['!=', 'h1', 'current'])->orderBy(['date'=> SORT_DESC])->asArray()->all();
	    $b_cur = BlogSlider::find()->where(['h1' => 'current'])->one();
        $dataProvider = new ActiveDataProvider([
            'query' => About::find(),
        ]);
		$about = About::find()->asArray()->all();
		$feedback = Feedback::find()->asArray()->all();
	    $title = KeyValue::getValue('about_page_meta_title');
	    $key = KeyValue::getValue('about_page_meta_key');
	    $desc = KeyValue::getValue('about_page_meta_desc');
	    $service = Service::find()->where(['!=', 'position', ''])->all();
	    \Yii::$app->view->registerMetaTag([
		    'name' => 'description',
		    'content' => $desc,
	    ]);
	    \Yii::$app->view->registerMetaTag([
		    'name' => 'keywords',
		    'content' => $key,
	    ]);
	    Yii::$app->opengraph->title = KeyValue::getValue('about_og_title');
	    Yii::$app->opengraph->description = KeyValue::getValue('about_og_description');
	    Yii::$app->opengraph->image = KeyValue::getValue('about_og_image');
	    Yii::$app->opengraph->url = KeyValue::getValue('about_og_url');
	    Yii::$app->opengraph->siteName = KeyValue::getValue('about_og_site_name');
	    Yii::$app->opengraph->type = KeyValue::getValue('about_og_type');
	    
        return $this->render('index', [
            'dataProvider' => $dataProvider, 'about' => $about, 'feedback' => $feedback, 'title' => $title, 'service' => $service, 'blog'=>$blog, 'b_cur'=>$b_cur,
        ]);
    }

    /**
     * Displays a single About model.
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
     * Creates a new About model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new About();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing About model.
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
     * Deletes an existing About model.
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
     * Finds the About model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return About the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = About::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('about', 'The requested page does not exist.'));
    }
}
