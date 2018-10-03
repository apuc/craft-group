<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\landing\models\LandingAssetSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Landing Assets';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="landing-asset-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить css/js файл', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            [
                'attribute'=>'lp_id',
                'value'=>function($data){
                    return $data->landing["title"];
                }
            ],
            [
                    'attribute'=>'type',
                'value'=>function($data){
                    return ($data->type == 0) ? "js" : "css";
                }
            ],
            'path',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
