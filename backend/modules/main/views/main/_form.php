<?php

use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
use mihaildev\elfinder\InputFile;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use xtarantulz\preview\PreviewAsset;
PreviewAsset::register($this);

/* @var $this yii\web\View */
/* @var $model common\models\Main */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="main-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
	
<?php //= $form->field($model, 'description')->widget(CKEditor::className(), [
//		'editorOptions' => ElFinder::ckeditorOptions('elfinder',['enterMode' => 2, 'forceEnterMode'=>false, 'shiftEnterMode'=>1  ]),
//	]);?>
	
	<?= $form->field($model, 'description')->textArea(['rows' => 6]) ?>
	
	<?=$form->field($model, 'file')->widget(InputFile::className(), [
		'language'      => 'ru',
		'controller'    => 'elfinder', // вставляем название контроллера, по умолчанию равен elfinder
		'filter'        => 'image',    // фильтр файлов, можно задать массив фильтров https://github.com/Studio-42/elFinder/wiki/Client-configuration-options#wiki-onlyMimes
		'template'      => '<div class="input-group">{input}<span class="input-group-btn">{button}</span></div>',
		'options'       => ['class' => 'form-control img'],
		'buttonOptions' => ['class' => 'btn btn-default'],
		'multiple'      => false       // возможность выбора нескольких файлов
	]);?>

    <?= $form->field($model, 'dt_add')->hiddenInput(['value'=> time()])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('main', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
