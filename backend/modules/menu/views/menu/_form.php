<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Menu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menu-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'href')->textInput(['maxlength' => true]) ?>
	
	<?=$form->field($model, 'page')->dropDownList([
		'main' => 'Главная',
		'about' => 'О нас',
		'other' => 'Другие страницы',
		'0' => 'Не отображать',
	],   [
		'prompt' => 'Выберите отображение'
	]);?>
	
	<?= $form->field($model, 'position')->textInput(['type'=>'number']) ?>
	
	<?= $form->field($model, 'dt_add')->textInput(['value'=>time(), 'readonly'=> true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('menu', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
