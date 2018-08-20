<?php

namespace frontend\modules\vacancy\controllers;

use common\models\KeyValue;
use Yii;
use common\models\Vacancy;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\BlogSlider;
/**
 * VacancyController implements the CRUD actions for Vacancy model.
 */
class VacancyController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all Vacancy models.
     * @return mixed
     */
    public function actionIndex()
    {
	    $blog = BlogSlider::find()->where(['!=', 'h1', 'current'])->orderBy(['date'=> SORT_DESC])->asArray()->all();
	    $b_cur = BlogSlider::find()->where(['h1' => 'current'])->one();
        $dataProvider = new ActiveDataProvider([
            'query' => Vacancy::find(),
        ]);
		$vacancy = Vacancy::find()->where(['options' => 1])->asArray()->all();
		$all_vacancy = Vacancy::find()->where(['options' => 2])->asArray()->all();
	    $title = KeyValue::getValue('vacancy_page_meta_title');
	    $key = KeyValue::getValue('vacancy_page_meta_key');
	    $desc = KeyValue::getValue('vacancy_page_meta_desc');
	    \Yii::$app->view->registerMetaTag([
		    'name' => 'description',
		    'content' => $desc,
	    ]);
	    \Yii::$app->view->registerMetaTag([
		    'name' => 'keywords',
		    'content' => $key,
	    ]);
	    Yii::$app->opengraph->title = KeyValue::getValue('vacancy_og_title');
	    Yii::$app->opengraph->description = KeyValue::getValue('vacancy_og_description');
	    Yii::$app->opengraph->image = KeyValue::getValue('vacancy_og_image');
	    Yii::$app->opengraph->url = KeyValue::getValue('vacancy_og_url');
	    Yii::$app->opengraph->siteName = KeyValue::getValue('vacancy_og_site_name');
	    Yii::$app->opengraph->type = KeyValue::getValue('vacancy_og_type');
        return $this->render('index', [
            'dataProvider' => $dataProvider, 'vacancy' => $vacancy, 'all' => $all_vacancy, 'title' => $title, 'b_cur'=>$b_cur, 'blog'=>$blog,
        ]);
    }
	
	public function actionSingleVacancy($slug)
	{
		$vacancy = Vacancy::find()->where(['slug'=>$slug])->one();
		$all_vacancy = Vacancy::find()->where(['options' => 2])->asArray()->limit(3)->offset($vacancy['id'])->all();
		$vacancy->updateCounters(['views' => 1]);
		$vacancy = $vacancy->toArray();
		return $this->render('single-vacancy', ['vacancy' => $vacancy, 'all' => $all_vacancy]);
	}
}
