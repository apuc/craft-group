<?php

namespace backend\modules\behance\controllers;

use backend\modules\behance\models\BehanceQueue;
use backend\modules\behance\models\BehanceWork;
use yii\debug\models\search\Debug;
use yii\helpers\ArrayHelper;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class QueueController extends \yii\web\Controller
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

    public function actionAddWork()
    {
        $model = new BehanceQueue();
        $model->load(Yii::$app->request->post());
        $model->save();

        return $this->redirect("index");
    }

    public function actionIndex()
    {

        $work = ArrayHelper::map(BehanceWork::find()->all(), 'id', 'name');

        foreach ($work as $key=>&$w)
        {
             $title = BehanceWork::findOne($key);
             $w.=" | ".$title->account['title'];
        }


        $works_in_queue = ArrayHelper::map(BehanceQueue::find()->all(), 'work_id', 'id');
        $work = array_diff_key($work,$works_in_queue);

        $model = new BehanceQueue();

        $dataProvider = new ActiveDataProvider([
            'query' => BehanceQueue::find()->orderBy("id desc"),
        ]);

        return $this->render('index',['works'=>$work,
            'provider'=>$dataProvider,
            'model'=>$model]);
    }

    public function actionDelete($id)
    {
        $model = BehanceQueue::findOne($id);
        $model->delete();

        return $this->redirect("index");
    }

}
