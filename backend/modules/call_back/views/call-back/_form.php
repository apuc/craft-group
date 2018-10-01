<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CallBack */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="call-back-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dt_add')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('call_back', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
