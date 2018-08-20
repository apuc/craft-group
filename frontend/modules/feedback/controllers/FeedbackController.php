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
        $dataProvider = new ActiveDataProvider([
            'query' => Feedback::find(),
        ]);
		$model = new Feedback();
		$feedback = Feedback::find()->where(['status' => 1])->all();
        $service = Service::find()->where(['options'=> 2])->asArray()->all();
	    $title = KeyValue::getValue('feedback_page_meta_title');
	    $key = KeyValue::getValue('feedback_page_meta_key');
	    $desc = KeyValue::getValue('feedback_page_meta_desc');
	    \Yii::$app->view->registerMetaTag([
		    'name' => 'description',
		    'content' => $desc,
	    ]);
	    \Yii::$app->view->registerMetaTag([
		    'name' => 'keywords',
		    'content' => $key,
	    ]);
	    Yii::$app->opengraph->title = KeyValue::getValue('feedback_og_title');
	    Yii::$app->opengraph->description = KeyValue::getValue('feedback_og_description');
	    Yii::$app->opengraph->image = KeyValue::getValue('feedback_og_image');
	    Yii::$app->opengraph->url = KeyValue::getValue('feedback_og_url');
	    Yii::$app->opengraph->siteName = KeyValue::getValue('feedback_og_site_name');
	    Yii::$app->opengraph->type = KeyValue::getValue('feedback_og_type');
        return $this->render('index', [
            'dataProvider' => $dataProvider, 'service' => $service, 'model' => $model, 'title' => $title, 'feedback' => $feedback,
        ]);
    }

    public function actionCreate()
    {
    	
    	/*загружаем файл*/
	    if (Yii::$app->request->isAjax)
	    {
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
