<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\landing\models\LandingPageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'LP';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="langing-page-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить Langing Page', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'title',
            'slug',
            [
                    'attribute'=>'dt_add',
                    'value'=>function($val){
                       return date("d:m:Y",$val->dt_add);
                    }

            ],
            [
                    'attribute'=>'dt_update',
                    'value'=>function($val){
                       return date("d:m:Y",$val->dt_add);
                    }

            ],
            [
                'attribute'=>'status',
                'value'=>function($val){
                    return ($val->status == 0) ? "не отображать" : "отображать";
                }

            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
