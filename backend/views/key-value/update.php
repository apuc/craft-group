<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\KeyValue */

$this->title = 'Редактировать опцию';
$this->params['breadcrumbs'][] = ['label' => 'Key Values', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="key-value-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
