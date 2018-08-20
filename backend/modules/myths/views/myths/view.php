<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Myths */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('myths', 'Myths'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="myths-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('myths', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('myths', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('myths', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'h1',
            'meta_key',
            'meta_desc',
            'description:ntext',
            'file',
            'slug',
            'options',
            'dt_add',
        ],
    ]) ?>

</div>
