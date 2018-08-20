<?php

namespace frontend\modules\blog\controllers;

use common\models\KeyValue;
use Yii;
use backend\modules\blog_slider\models\BlogSlider;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BlogController implements the CRUD actions for BlogSlider model.
 */
class BlogController extends Controller
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
     * Lists all BlogSlider models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => BlogSlider::find(),
        ]);
        $blog = BlogSlider::find()->where(['!=', 'options', 0])->andWhere(['!=','h1', 'current'])->orderBy(['date'=> SORT_DESC])->asArray()->all();
	    $b_cur = BlogSlider::find()->where(['h1' => 'current'])->one();
	    $title = KeyValue::getValue('blog_page_meta_title');
	    $key = KeyValue::getValue('blog_page_meta_key');
	    $desc = KeyValue::getValue('blog_page_meta_desc');
	    \Yii::$app->view->registerMetaTag([
		    'name' => 'description',
		    'content' => $desc,
	    ]);
	    \Yii::$app->view->registerMetaTag([
		    'name' => 'keywords',
		    'content' => $key,
	    ]);
	    Yii::$app->opengraph->title = KeyValue::getValue('blog_og_title');
	    Yii::$app->opengraph->description = KeyValue::getValue('blog_og_description');
	    Yii::$app->opengraph->image = KeyValue::getValue('blog_og_image');
	    Yii::$app->opengraph->url = KeyValue::getValue('blog_og_url');
	    Yii::$app->opengraph->siteName = KeyValue::getValue('blog_og_site_name');
	    Yii::$app->opengraph->type = KeyValue::getValue('blog_og_type');
	    
        return $this->render('index', [
            'dataProvider' => $dataProvider, 'blog'=> $blog, 'title' => $title, 'b_cur' => $b_cur,
        ]);
    }
    
	public function actionSingleBlog($slug)
	{
		$blog = BlogSlider::find()->where(['slug'=>$slug])->asArray()->one();
		$slider = BlogSlider::find()->where(['!=', 'options', 0])->andWhere(['!=','h1', 'current'])->orderBy(['date'=> SORT_DESC])->asArray()->all();
		$all = BlogSlider::find()->where(['h1' => 'current'])->one();
		return $this->render('single-blog', ['blog' => $blog, 'slider' => $slider, 'all' => $all ]);
	}
	
}
