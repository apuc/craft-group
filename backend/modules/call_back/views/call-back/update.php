<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CallBack */

$this->title = Yii::t('call_back', 'Update Call Back: ' . $model->id, [
    'nameAttribute' => '' . $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('call_back', 'Call Backs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('call_back', 'Update');
?>
<div class="call-back-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
