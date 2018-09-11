<?php

namespace frontend\modules\feedback\controllers;

use common\models\KeyValue;
use common\models\Service;
use Yii;
use common\models\Feedback;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use common\models\UploadForm;

/**
 * FeedbackController implements the CRUD actions for Feedback model.
 */
class FeedbackController extends Controller
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
     * Lists all Feedback models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->view->title = 'Отзывы';
        $dataProvider = new ActiveDataProvider([
            'query' => Feedback::find(),
        ]);
        $model = new Feedback();
        $feedback = Yii::$app->cache->getOrSet("feedback_main", function () {
            return Feedback::find()->where(['status' => 1])->limit(6)->all();
        });
        $title = Yii::$app->cache->getOrSet("feedback_page_meta_title", function () {
            return KeyValue::getValue('feedback_page_meta_title');
        });
        $key = Yii::$app->cache->getOrSet("feedback_page_meta_key", function () {
            return KeyValue::getValue('feedback_page_meta_key');
        });
        $desc = Yii::$app->cache->getOrSet("feedback_page_meta_desc", function () {
            return KeyValue::getValue('feedback_page_meta_desc');
        });
        \Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => $desc,
        ]);
        \Yii::$app->view->registerMetaTag([
            'name' => 'keywords',
            'content' => $key,
        ]);
        Yii::$app->opengraph->title = Yii::$app->cache->getOrSet("feedback_og_title", function () {
            return KeyValue::getValue('feedback_og_title');
        });
        Yii::$app->opengraph->description = Yii::$app->cache->getOrSet("feedback_og_description", function () {
            return KeyValue::getValue('feedback_og_description');
        });
        Yii::$app->opengraph->image = Yii::$app->cache->getOrSet("feedback_og_image", function () {
            return KeyValue::getValue('feedback_og_image');
        });
        Yii::$app->opengraph->url = Yii::$app->cache->getOrSet("feedback_og_url", function () {
            return KeyValue::getValue('feedback_og_url');
        });
        Yii::$app->opengraph->siteName = Yii::$app->cache->getOrSet("feedback_og_site_name", function () {
            return KeyValue::getValue('feedback_og_site_name');
        });
        Yii::$app->opengraph->type = Yii::$app->cache->getOrSet("feedback_og_type", function () {
            return KeyValue::getValue('feedback_og_type');
        });
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'model' => $model, 
            'title' => $title, 
            'feedback' => $feedback,
        ]);
    }

    public function actionCreate()
    {

        /*загружаем файл*/
        if (Yii::$app->request->isAjax) {
            $model = new Feedback();
            $model->title = $_POST['Feedback']['name'];

            if ($model->load(Yii::$app->request->post()) && $model->save(false)) {
                return $model->sendMail();
            } else {
                Yii::$app->session->setFlash('error', "Ваше сообщение не отправлено!");
                return $this->redirect(['/feedback']);
            }
        }


    }
}
