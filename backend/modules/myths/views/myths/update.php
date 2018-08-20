<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Myths */

$this->title = Yii::t('myths', 'Update Myths: ' . $model->title, [
    'nameAttribute' => '' . $model->title,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('myths', 'Myths'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('myths', 'Update');
?>
<div class="myths-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
