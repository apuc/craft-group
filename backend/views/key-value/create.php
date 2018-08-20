<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\KeyValue */

$this->title = 'Добавление опции для сайта';
$this->params['breadcrumbs'][] = ['label' => 'Key Values', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="key-value-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
