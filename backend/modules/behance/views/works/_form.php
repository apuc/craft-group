<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model backend\modules\behance\models\BehanceWork */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="behance-work-form">

    <?php $form = ActiveForm::begin(); ?>

    <?=  $form->field($model, 'account_id')->dropDownList($accounts,['class'=>"form-control"]); ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Добавить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
