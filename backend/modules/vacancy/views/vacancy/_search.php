<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\vacancy\controllers\VacancySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vacancy-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'h1') ?>

    <?= $form->field($model, 'meta_key') ?>

    <?= $form->field($model, 'meta_desc') ?>

    <?php // echo $form->field($model, 'file') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'options') ?>

    <?php // echo $form->field($model, 'href') ?>

    <?php // echo $form->field($model, 'slug') ?>

    <?php // echo $form->field($model, 'views') ?>

    <?php // echo $form->field($model, 'date') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('vacancy', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('vacancy', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
