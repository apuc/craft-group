<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * KeyValueController implements the CRUD actions for KeyValue model.
 */
class CacheController extends Controller {
	/**
	 * @inheritdoc
	 */
	public function behaviors() {
		return [
			'verbs' => [
				'class'   => VerbFilter::className(),
				'actions' => [
					'delete' => [ 'POST' ],
				],
			],
		];
	}
	
	public function actionIndex()
	{
		return $this->render('index');
	}
	
	public function actionDelCache() {
		if(Yii::$app->cache->flush()) {
			Yii::$app->session->setFlash('success', 'Кэш очищен');
			return $this->redirect(['index']);
		} else {
			Yii::$app->session->setFlash('error', 'Ошибка');
			return $this->redirect(['index']);
		}
	}
}