<?php

use mihaildev\elfinder\InputFile;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
use xtarantulz\preview\PreviewAsset;
PreviewAsset::register($this);

/* @var $this yii\web\View */
/* @var $model common\models\Myths */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="myths-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'h1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'meta_key')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'meta_desc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
	
	<?=$form->field($model, 'file')->widget(InputFile::className(), [
		'language'      => 'ru',
		'controller'    => 'elfinder', // вставляем название контроллера, по умолчанию равен elfinder
		'filter'        => 'image',    // фильтр файлов, можно задать массив фильтров https://github.com/Studio-42/elFinder/wiki/Client-configuration-options#wiki-onlyMimes
		'template'      => '<div class="input-group">{input}<span class="input-group-btn">{button}</span></div>',
		'options'       => ['class' => 'form-control img'],
		'buttonOptions' => ['class' => 'btn btn-default'],
		'multiple'      => false       // возможность выбора нескольких файлов
	]);?>
	
	<?=$form->field($model, 'options')->dropDownList([
		'1' => 'Главная',
		'2' => 'На страницах мифы',
		'0'=>'Отключено'
	],   [
		'prompt' => 'Выберите отображение'
	]);?>

    <?= $form->field($model, 'slug')->hiddenInput(['maxlength' => true])->label(false) ?>

    <?= $form->field($model, 'dt_add')->hiddenInput(['value' => time()])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('myths', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
