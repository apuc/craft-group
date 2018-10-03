<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\LpOption */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Lp Options', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lp-option-view">



    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute'=>'lp_id',
                'value'=>function($model){
                    return $model->landing['title'];
                },
                'format'=>'raw'
            ],
            'metka',
            'key',
            'value',
        ],
    ]) ?>

</div>
