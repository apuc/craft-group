<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\LpOption */
/* @var $form yii\widgets\ActiveForm */


?>

<div class="lp-option-form">

    <?php $form = ActiveForm::begin(); ?>

    <?=  $form->field($model, 'lp_id')->dropDownList($pages,['class'=>"form-control"]); ?>

    <?= $form->field($model, 'metka')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'key')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'value')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
