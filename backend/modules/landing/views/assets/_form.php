<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\LandingAsset */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="landing-asset-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype' => 'multipart/form-data']]); ?>

    <?=  $form->field($model, 'lp_id')->dropDownList($pages,['class'=>"form-control"]); ?>

    <?=  $form->field($model, 'type')->dropDownList(['js','css'],['class'=>"form-control"]); ?>

    <div class="form-group">
        <?= Html::label("Файл") ?>
        <?= Html::fileInput('file','',['required'=>'true']) ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Добавить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
