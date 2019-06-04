<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\call_back\controllers\CallBackSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('call_back', 'Call Backs');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="call-back-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('call_back', 'Create Call Back'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'phone',
            [
                'attribute' => 'dt_add',
                'format' => 'text',
                'value' => function($data){
                    return $data->dt_add = Yii::$app->formatter->asDate( $data->dt_add, 'd.MM.yyyy');
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
