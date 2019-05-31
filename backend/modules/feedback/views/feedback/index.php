<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\feedback\models\FeedbackSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Отзывы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feedback-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'name',
            'phone',
            'email:email',
            'site',
            //'message:ntext',
            [
                'attribute' => 'status',
                'value' => function ($model) {
                    return ($model->status) ? "Активен" : "Не активен";
                }
            ],
            [
                'attribute' => 'fileName',
                'label' => 'Прикрепленный файл',
                'format' => 'raw',
                'value' => function ($model) {
                    return $model->fileName ? Html::img( $model->fileName, ['width' => '200']) : "";
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
