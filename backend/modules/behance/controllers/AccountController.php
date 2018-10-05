<?php

namespace backend\modules\behance\controllers;

use backend\modules\behance\models\BehanceWork;
use Yii;
use backend\modules\behance\models\BehanceAccount;
use backend\modules\behance\models\BehanceAccountSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Command;
use yii\filters\AccessControl;

/**
 * AccountController implements the CRUD actions for BehanceAccount model.
 */
class AccountController extends Controller
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

    public function actionParse($user)
    {
        Yii::$app->db->createCommand()->setRawSql("TRUNCATE TABLE behance_works")->execute();

       $token = "H4Va0PDSnn8UhDxdqtkYNOkFJC8lbcYU";
       $i=1;

       while($i>0)
       {

           $url = "https://api.behance.net//v2/users/".$user."/projects?client_id=".$token."&page=".$i;
           $res = $this->ApiRequest($url);
           $i++;


           if(empty($res->projects))
               break;

          foreach ($res->projects as $p)
          {

              $model = new BehanceWork();
              $model->name = $p->name;
              $model->behance_id = $p->id;
              $model->url = $p->url;
              $model->preview = end($p->covers);
              $model->save();
          }


       }

       Yii::$app->session->setFlash("success","Работы получены");
       return $this->redirect("index");
    }

    private function ApiRequest($url)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL,$url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $res = curl_exec($curl);

        curl_close($curl);

        return json_decode($res);
    }


    public function actionIndex()
    {
        $searchModel = new BehanceAccountSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    public function actionCreate()
    {
        $model = new BehanceAccount();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }


    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }


    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }


    protected function findModel($id)
    {
        if (($model = BehanceAccount::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
