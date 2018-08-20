<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\KeyValue */

$this->title = Yii::t('seo', 'Update Key Value: {nameAttribute}', [
    'nameAttribute' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('seo', 'Key Values'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('seo', 'Update');
?>
<div class="key-value-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
