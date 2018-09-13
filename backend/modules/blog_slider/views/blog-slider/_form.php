<?php

use mihaildev\elfinder\InputFile;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
use xtarantulz\preview\PreviewAsset;
PreviewAsset::register($this);

/* @var $this yii\web\View */
/* @var $model backend\modules\blog_slider\models\BlogSlider */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="blog-slider-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'h1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'meta_key')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'meta_desc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'href')->hiddenInput(['rows' => 6])->label(false) ?>


	<?=$form->field($model, 'options')->dropDownList([
		'1' => 'Везде',
		'2' => 'На странице блог',
		'0'=>'Отключен'
	],   [
		'prompt' => 'Выберите отображение'
	]);?>

	<?= $form->field($model, 'description')->widget(CKEditor::className(), [
		'editorOptions' => ElFinder::ckeditorOptions('elfinder',['enterMode' => 2, 'forceEnterMode'=>false, 'shiftEnterMode'=>1  ]),
	]);?>

	<?= $form->field($model, 'preview_text')->widget(CKEditor::className(), [
		'editorOptions' => ElFinder::ckeditorOptions('elfinder',['enterMode' => 2, 'forceEnterMode'=>false, 'shiftEnterMode'=>1  ]),
	]);?>

	<?=$form->field($model, 'file')->widget(InputFile::className(), [
		'language'      => 'ru',
		'controller'    => 'elfinder', // вставляем название контроллера, по умолчанию равен elfinder
		'filter'        => 'image',    // фильтр файлов, можно задать массив фильтров https://github.com/Studio-42/elFinder/wiki/Client-configuration-options#wiki-onlyMimes
		'template'      => '<div class="input-group">{input}<span class="input-group-btn">{button}</span></div>',
		'options'       => ['class' => 'form-control img'],
		'buttonOptions' => ['class' => 'btn btn-default'],
		'multiple'      => false       // возможность выбора нескольких файлов
	])->label('Картинка блога');?>

	<?= $form->field($model, 'compressing_image')->checkbox();?>


    <?= $form->field($model, 'slug')->hiddenInput(['maxlength' => true, 'hidden' => true])->label(false)?>

    <?= $form->field($model, 'date')->hiddenInput(['value'=> ($model->date) ? $model->date : date('Y-m-d H:i:s') ])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('blog', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
