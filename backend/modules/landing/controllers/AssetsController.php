<?php

namespace backend\modules\landing\controllers;

use Yii;
use common\models\LandingAsset;
use backend\modules\landing\models\LandingAssetSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use backend\modules\landing\models\LangingPage;
use yii\web\UploadedFile;

/**
 * AssetsController implements the CRUD actions for LandingAsset model.
 */
class AssetsController extends Controller
{
    /**
     * {@inheritdoc}
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


    public function actionIndex()
    {
        $searchModel = new LandingAssetSearch();
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
        $model = new LandingAsset();
        $pages = ArrayHelper::map(LangingPage::find()->all(), 'id', 'title');

        if (Yii::$app->request->post()) {

            $model->save();
            $model->load(Yii::$app->request->post());

            if(!is_dir(Yii::getAlias('@frontend/web/uploads/lp_assets/').$model->id))
            {
                mkdir(Yii::getAlias('@frontend/web/uploads/lp_assets/').$model->id);
            }

            $file = UploadedFile::getInstanceByName('file');
            $path = Yii::getAlias('@frontend/web/uploads/lp_assets/'.$model->id.'/'). $file->baseName . '.' . $file->extension;
            $file->saveAs($path);

            $model->path = "/uploads/lp_assets/".$model->id."/". $file->baseName . '.' . $file->extension;

            $model->save();
            return $this->redirect('index');
        }

        return $this->render('create', [
            'model' => $model,
            'pages' => $pages,
        ]);
    }


    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $pages = ArrayHelper::map(LangingPage::find()->all(), 'id', 'title');

        if ($model->load(Yii::$app->request->post())) {

            $file = UploadedFile::getInstanceByName('file');
            $path = Yii::getAlias('@frontend/web/uploads/lp_assets/'.$model->id.'/'). $file->baseName . '.' . $file->extension;
            $file->saveAs($path);

            $model->path = "/uploads/lp_assets/".$model->id."/". $file->baseName . '.' . $file->extension;
            $model->save();

            return $this->redirect('index');
        }

        return $this->render('update', [
            'model' => $model,
            'pages' => $pages,
        ]);
    }


    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        unlink(Yii::getAlias('@frontend/web/').$model->path);
        $model->delete();

        return $this->redirect(['index']);
    }


    protected function findModel($id)
    {
        if (($model = LandingAsset::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
