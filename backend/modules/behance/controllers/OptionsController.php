<?php

namespace backend\modules\behance\controllers;

use yii\web\UploadedFile;
use backend\modules\behance\models\Proxy;
use Yii;

class OptionsController extends \yii\web\Controller
{
    public function actionIndex()
    {

        return $this->render('index');
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

}
