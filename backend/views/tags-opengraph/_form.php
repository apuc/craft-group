<?php

use mihaildev\elfinder\InputFile;
use xtarantulz\preview\PreviewAsset;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
PreviewAsset::register($this);

/* @var $this yii\web\View */
/* @var $model common\models\TagsOpengraph */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tags-opengraph-form">

	<?php $form = ActiveForm::begin(); ?>

	<?= $form->field($model, 'page')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'key')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'image')->widget(InputFile::className(), [
		'language' => 'ru',
		'controller' => 'elfinder', // вставляем название контроллера, по умолчанию равен elfinder
		'filter' => 'image',    // фильтр файлов, можно задать массив фильтров https://github.com/Studio-42/elFinder/wiki/Client-configuration-options#wiki-onlyMimes
		'template' => '<div class="input-group">{input}<span class="input-group-btn">{button}</span></div>',
		'options' => ['class' => 'form-control img'],
		'buttonOptions' => ['class' => 'btn btn-default'],
		'multiple' => false       // возможность выбора нескольких файлов
	]); ?>

	<div class="form-group">
		<?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
	</div>

	<?php ActiveForm::end(); ?>

</div>
