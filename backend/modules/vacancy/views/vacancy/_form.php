<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
use xtarantulz\preview\PreviewAsset;

/* @var $this yii\web\View */
/* @var $model common\models\Vacancy */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vacancy-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'h1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'meta_key')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'meta_desc')->textInput(['maxlength' => true]) ?>

	<?=$form->field( $model,'description' )->widget( CKEditor::className(),[
		'editorOptions' => ElFinder::ckeditorOptions( 'elfinder',['enterMode' => 2, 'forceEnterMode'=>false, 'shiftEnterMode'=>1  ] ),
	] );?>
	
	<?=$form->field( $model,'demands' )->widget( CKEditor::className(),[
		'editorOptions' => ElFinder::ckeditorOptions( 'elfinder',['enterMode' => 2, 'forceEnterMode'=>false, 'shiftEnterMode'=>1] ),
	] );?>
	
	<?=$form->field( $model,'conditions' )->widget( CKEditor::className(),[
		'editorOptions' => ElFinder::ckeditorOptions( 'elfinder',['enterMode' => 2, 'forceEnterMode'=>false, 'shiftEnterMode'=>1] ),
	] );?>
	
	<?= $form->field($model, 'file')->hiddenInput(['maxlength' => true])->label(false) ?>
	
	<?=$form->field($model, 'options')->dropDownList([
		'0'=> 'Отключено',
		'1' => 'Показывать на главной',
		'2' => 'Показывать везде'
	],   [
		'prompt' => 'Выберите отображение'
	]);?>
	
	<?=$form->field($model, 'img')->widget(InputFile::className(), [
		'language'      => 'ru',
		'controller'    => 'elfinder', // вставляем название контроллера, по умолчанию равен elfinder
		'filter'        => 'image',    // фильтр файлов, можно задать массив фильтров https://github.com/Studio-42/elFinder/wiki/Client-configuration-options#wiki-onlyMimes
		'template'      => '<div class="input-group">{input}<span class="input-group-btn">{button}</span></div>',
		'options'       => ['class' => 'form-control img'],
		'buttonOptions' => ['class' => 'btn btn-default'],
		'multiple'      => false       // возможность выбора нескольких файлов
	]);?>
	
    <?= $form->field($model, 'href')->hiddenInput(['rows' => 6])->label(false) ?>

    <?= $form->field($model, 'slug')->hiddenInput(['maxlength' => true])->label(false) ?>
	
    <?= $form->field($model, 'views')->textInput(['readonly' => true,'maxlength' => true])->label(Yii::t('vacancy', 'Views')) ?>
	
    <?= $form->field($model, 'date')->hiddenInput(['readonly' => true, 'value' => date('Y-m-d H:i:m')])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('vacancy', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
