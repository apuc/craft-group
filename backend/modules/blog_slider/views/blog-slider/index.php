<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\blog_slider\models\BlogSliderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('blog', 'Blog Slider');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blog-slider-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('blog', 'Create Blog Slider'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'title',
            //'h1',
            //'meta_key',
            //'meta_desc',
            //'href:ntext',
            //'description:ntext',
            [
                'attribute' => 'file',
                'format' => 'raw',
                'value' => function($model){
                    return $model->file ? Html::img($model->file, ['width'=>'100px']) : '';
                }
            ],
            //'options',
            //'slug',
            [
                'attribute' => 'date',
                'value' => function($data){
                    return Yii::$app->formatter->asDate( $data->date, 'd.MM.yyyy');
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
