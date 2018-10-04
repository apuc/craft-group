<?php

namespace backend\modules\landing\controllers;

use backend\modules\landing\models\LangingPage;
use Yii;
use common\models\LpOption;
use backend\modules\landing\models\LpOptionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * OptionsController implements the CRUD actions for LpOption model.
 */
class OptionsController extends Controller
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
        $searchModel = new LpOptionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
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
        $model = new LpOption();
        $pages = ArrayHelper::map(LangingPage::find()->all(), 'id', 'title');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect('index');
        }

        return $this->render('create', [
            'model' => $model,
            'pages' => $pages,
        ]);
    }


    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $pages = ArrayHelper::map(LangingPage::find()->all(), 'id', 'title');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect("index");
        }

        return $this->render('update', [
            'model' => $model,
            'pages'=>$pages
        ]);
    }


    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }


    protected function findModel($id)
    {
        if (($model = LpOption::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
