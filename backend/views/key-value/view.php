<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\KeyValue */

$this->title = $model->key;
$this->params['breadcrumbs'][] = ['label' => 'Key Values', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="key-value-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить опцию?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'key',
            'value:ntext',
            'label',
        ],
    ]) ?>

</div>
