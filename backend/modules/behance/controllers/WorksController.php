<?php

namespace backend\modules\behance\controllers;

use backend\modules\behance\models\BehanceAccount;
use Yii;
use backend\modules\behance\models\BehanceWork;
use backend\modules\behance\models\BehanceWorkSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * WorksController implements the CRUD actions for BehanceWork model.
 */
class WorksController extends Controller
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
        ];
    }

    public function actionIndex()
    {
        $searchModel = new BehanceWorkSearch();
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
        $model = new BehanceWork();
        $accounts = ArrayHelper::map(BehanceAccount::find()->all(), 'id', 'title');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash("success","Робота добавленна!");
        }

        return $this->render('create', [
            'model' => $model,
            'accounts' => $accounts,
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
        if (($model = BehanceWork::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
