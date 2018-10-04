<?php

namespace backend\modules\behance\controllers;

use backend\modules\behance\models\BehanceOption;
use yii\web\UploadedFile;
use backend\modules\behance\models\Proxy;
use Yii;

class OptionsController extends \yii\web\Controller
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
        $max_likes = BehanceOption::find()->where("name='max_likes'")->one();
        return $this->render('index',['max_likes'=>$max_likes]);
    }

    public function actionFill()
    {
        $proxy = file($_FILES['ipfile']['tmp_name']);

        $res = array();
        foreach ($proxy as $ip)
        {
            $res[] = [$ip];
        }

        $model = new Proxy();
        $model->FillProxyTable($res);

        Yii::$app->session->setFlash("success","Адресса proxy добавленны!");
        return $this->redirect(['index']);

    }

    public function actionSave()
    {
        $val = Yii::$app->request->post('max_likes');
        Yii::$app->db->createCommand()->update('behance_options', ['value' => $val], 'name="max_likes"')->execute();

        Yii::$app->session->setFlash("success","Опции сохранены!");
        return $this->redirect(['index']);
    }


}
