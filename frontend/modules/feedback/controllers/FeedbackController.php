<?php

namespace frontend\modules\feedback\controllers;

use common\models\KeyValue;
use common\models\Service;
use frontend\models\TagsOpengraph;
use Yii;
use common\models\Feedback;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
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
        
        TagsOpengraph::findOne(['key'=>'feedback'])->registerOGTags(Url::to(['/feedback'], true));
        
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'model' => $model, 
            'title' => $title,
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
