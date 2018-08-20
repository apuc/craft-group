<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;

/* @var $this yii\web\View */
/* @var $model backend\modules\contacts\models\Contacts */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contacts-form">

    <?php $form = ActiveForm::begin(); ?>
	
	<?=$form->field($model, 'name')->dropDownList([
		'phone' => 'Телефон',
		'social' => 'Соц.сеть',
		'mess' => 'Мессенджер',
		'email'=> 'E-mail',
		'logo'=> 'Логотип',
		'footer'=> 'Футер текстовая информация',
	],   [
		'prompt' => 'Выберите из списка категорию'
	]);?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
	
	<?= $form->field($model, 'file')->widget(CKEditor::className(), [
		'editorOptions' => ElFinder::ckeditorOptions('elfinder',['enterMode' => 2, 'forceEnterMode'=>false, 'shiftEnterMode'=>1  ]),
	])->label('Текст или картинка с ссылкой для категории');?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('contacts', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
