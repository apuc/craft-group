<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\myths\controllers\MythsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="myths-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'h1') ?>

    <?= $form->field($model, 'meta_key') ?>

    <?= $form->field($model, 'meta_desc') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'file') ?>

    <?php // echo $form->field($model, 'slug') ?>

    <?php // echo $form->field($model, 'dt_add') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('myths', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('myths', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
