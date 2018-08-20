<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\feedback\controllers\FeedbackSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="feedback-search">

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

    <?php // echo $form->field($model, 'href') ?>

    <?php // echo $form->field($model, 'city') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'site') ?>

    <?php // echo $form->field($model, 'category') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'date') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('feedback', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('feedback', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
