<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\myths\controllers\MythsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('myths', 'Myths');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="myths-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('myths', 'Create Myths'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'h1',
            'meta_key',
            'meta_desc',
            //'description:ntext',
            //'file',
            //'slug',
            //'dt_add',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
