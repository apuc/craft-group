<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

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
			'access' => [
				'class' => AccessControl::className(),
				'rules' => [
					[
						'actions' => ['login', 'error'],
						'allow' => true,
					],
					[
						'actions' => ['logout', 'index', 'view', 'create', 'update'],
						'allow' => true,
						'roles' => ['@'],
					],
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