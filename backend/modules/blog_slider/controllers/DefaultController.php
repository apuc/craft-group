<?php

namespace backend\modules\blog_slider\controllers;

use yii\web\Controller;

/**
 * Default controller for the `blog_slider` module
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
