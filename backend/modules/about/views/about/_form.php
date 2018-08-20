<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;

/* @var $this yii\web\View */
/* @var $model common\models\About */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="about-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'h1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'meta_key')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'meta_desc')->textInput(['maxlength' => true]) ?>
	
	<?=$form->field( $model,'description' )->widget( CKEditor::className(),[
		'editorOptions' => ElFinder::ckeditorOptions( 'elfinder',['enterMode' => 2, 'forceEnterMode'=>false, 'shiftEnterMode'=>1  ] ),
	] );?>
	
	<?=$form->field( $model,'file' )->widget( CKEditor::className(),[
		'editorOptions' => ElFinder::ckeditorOptions( 'elfinder',['enterMode' => 2, 'forceEnterMode'=>false, 'shiftEnterMode'=>1] ),
	] );?>
	
	<?php // $form->field($model, 'file')->textArea(['maxlength' => true]) ?>

    <?= $form->field($model, 'href')->textarea(['rows' => 6]) ?>
	

    <?= $form->field($model, 'options')->hiddenInput(['value'=> 0])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('about', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
