<?php

use mihaildev\elfinder\InputFile;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
use xtarantulz\preview\PreviewAsset;
PreviewAsset::register($this);

/* @var $this yii\web\View */
/* @var $model backend\modules\portfolio\models\Portfolio */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="portfolio-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'h1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'meta_key')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'meta_desc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'stock')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'href')->textarea(['rows' => 6, 'placeholder' => 'Ссылка1, ссылка2']) ?>
	
	<?=$form->field($model, 'options')->dropDownList([
		'1' => 'Везде',
		'2' => 'На странице услуги',
		'3' => 'На странице портфолио и услуги',
		'0'=>'Отключен'
	],   [
        'prompt' => 'Выберите отображение'
    ]);?>

    <?= $form->field($model, 'slug')->hiddenInput(['maxlength' => true])->label(false) ?>
	
	<?= $form->field($model, 'description')->widget(CKEditor::className(),[
		'editorOptions' => [
			'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
			'inline' => false, //по умолчанию false
		],
	]);?>
	
	<?=$form->field($model, 'file')->widget(InputFile::className(), [
		'language'      => 'ru',
		'controller'    => 'elfinder', // вставляем название контроллера, по умолчанию равен elfinder
		'filter'        => 'image',    // фильтр файлов, можно задать массив фильтров https://github.com/Studio-42/elFinder/wiki/Client-configuration-options#wiki-onlyMimes
		'template'      => '<div class="input-group">{input}<span class="input-group-btn">{button}</span></div>',
		'options'       => ['class' => 'form-control img'],
		'buttonOptions' => ['class' => 'btn btn-default'],
		'multiple'      => false       // возможность выбора нескольких файлов
	]);?>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('portfolio', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
