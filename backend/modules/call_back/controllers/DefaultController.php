<?php

namespace backend\modules\call_back\controllers;

use yii\web\Controller;

/**
 * Default controller for the `call_back` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
