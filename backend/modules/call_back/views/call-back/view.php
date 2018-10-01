<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\CallBack */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('call_back', 'Call Backs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="call-back-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('call_back', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('call_back', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('call_back', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'phone',
            'dt_add',
        ],
    ]) ?>

</div>
