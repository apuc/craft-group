<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\behance\models\BehanceWorkSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Работы Behance';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="behance-work-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить работу', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            'url:url',
            [
              "format"=>"raw",
              'attribute'=>'account_id',
              'value'=>function($data){
                 return $data->account['title'];
              }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
