<?php

namespace frontend\modules\myths\controllers;

use backend\modules\blog_slider\models\BlogSlider;
use frontend\modules\myths\models\Myths;
use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MythsController implements the CRUD actions for Myths model.
 */
class MythsController extends Controller
{
	/**
	 * {@inheritdoc}
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
	 * Lists all Myths models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		$blog = Yii::$app->cache->getOrSet("myth_blog", function () {
			return BlogSlider::find()->where(['!=', 'h1', 'current'])->orderBy(['date' => SORT_DESC])->asArray()->all();
		});
		$b_cur = BlogSlider::find()->where(['h1' => 'current'])->one();
		$myths = Myths::find()->where(['options' => 2])->all();
		$dataProvider = new ActiveDataProvider([
			'query' => Myths::find(),
		]);

		return $this->render('index', [
			'dataProvider' => $dataProvider, 'blog' => $blog, 'b_cur' => $b_cur, 'myths' => $myths,
		]);
	}

	public function actionSingleMyths($slug)
	{
		$myths = Myths::find()->where(['slug'=>$slug])->one();
		$slider = Yii::$app->cache->getOrSet("slider", function (){
			return BlogSlider::find()->where(['!=', 'options', 0])->andWhere(['!=','h1', 'current'])->orderBy(['date'=> SORT_DESC])->all();});
		$all = BlogSlider::find()->where(['h1' => 'current'])->one();
//		Yii::$app->opengraph->title = $blog['title'];
//		Yii::$app->opengraph->description = $blog['description'];
//		Yii::$app->opengraph->image = $blog['file'];
//		Yii::$app->opengraph->url = Url::home('https').'blog/'.$slug;
//		Yii::$app->opengraph->siteName =  Yii::$app->name;
//		Yii::$app->opengraph->type = 'article';
//		if($blog) {
//			return $this->render('single-blog', ['blog' => $blog, 'slider' => $slider, 'all' => $all ]);
//		} else {
//			return $this->redirect(['/'.$slug]);
//		}
		return $this->render('single-myths', ['myths' => $myths, 'slider' => $slider, 'all' => $all ]);
	}

	/**
	 * Displays a single Myths model.
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
	 * Creates a new Myths model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
		$model = new Myths();

		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			return $this->redirect(['view', 'id' => $model->id]);
		}

		return $this->render('create', [
			'model' => $model,
		]);
	}

	/**
	 * Updates an existing Myths model.
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
	 * Deletes an existing Myths model.
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
	 * Finds the Myths model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return Myths the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		if (($model = Myths::findOne($id)) !== null) {
			return $model;
		}

		throw new NotFoundHttpException(Yii::t('myths', 'The requested page does not exist.'));
	}
}
