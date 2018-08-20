<?php

use mihaildev\elfinder\InputFile;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
use xtarantulz\preview\PreviewAsset;
PreviewAsset::register($this);

/* @var $this yii\web\View */
/* @var $model common\models\Feedback */
/* @var $form yii\widgets\ActiveForm */
$category = [];
$service = \common\models\Service::find()->asArray()->all();
foreach ( $service as $key => $value ) {
	$category[$value['id']] = $value ['title'];
}

?>

<div class="feedback-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'h1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'meta_key')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'meta_desc')->textInput(['maxlength' => true]) ?>
	
	<?= $form->field($model, 'description')->widget(CKEditor::className(), [
		'editorOptions' => ElFinder::ckeditorOptions('elfinder',['enterMode' => 2, 'forceEnterMode'=>false, 'shiftEnterMode'=>1  ]),
	]);?>
	
	<?=$form->field($model, 'file')->widget(InputFile::className(), [
		'language'      => 'ru',
		'controller'    => 'elfinder', // вставляем название контроллера, по умолчанию равен elfinder
		'filter'        => 'image',    // фильтр файлов, можно задать массив фильтров https://github.com/Studio-42/elFinder/wiki/Client-configuration-options#wiki-onlyMimes
		'template'      => '<div class="input-group">{input}<span class="input-group-btn">{button}</span></div>',
		'options'       => ['class' => 'form-control img'],
		'buttonOptions' => ['class' => 'btn btn-default'],
		'multiple'      => true       // возможность выбора нескольких файлов
	])->label('Картинки');?>

    <?= $form->field($model, 'href')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'site')->textInput(['maxlength' => true]) ?>
	
	<?=$form->field($model, 'category')->dropDownList($category,   [
		'prompt' => 'Выберите категорию'
	]);?>
	
	<?=$form->field($model, 'status')->dropDownList(['0'=> 'Не показывать', '1' => 'Показывать', '2' => 'В ожидании'],   [
		'prompt' => 'Выберите статус'
	]);?>

    <?= $form->field($model, 'date')->hiddenInput(['value'=> date('Y-m-d H:i:s') ])->label(false)?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('feedback', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
