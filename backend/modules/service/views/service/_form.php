<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\elfinder\InputFile;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
use kartik\select2\Select2;
use xtarantulz\preview\PreviewAsset;
PreviewAsset::register($this);


/* @var $this yii\web\View */
/* @var $model backend\modules\service\models\Service */
/* @var $form yii\widgets\ActiveForm */
/**
 * @var $portfolio array
 * @var $feedback array
 */
$portfolio = \common\models\Portfolio::find()->asArray()->all();
//$feedback = \common\models\Feedback::find()->andWhere(['status' => 1])->andWhere(['category' => $model->id])->asArray()->all();
$feedback = \common\models\Feedback::find()->andWhere(['status' => 1])->asArray()->all();
$por       = [];
$feed     = [];
foreach ( $portfolio as $key => $value ) {
	$por[ $value['id'] ] = $value['title'];
}
foreach ( $feedback as $key => $value ) {
	$feed[ $value['id'] ] = $value['message'];
}

?>

<div class="service-form">
	
	<?php $form = ActiveForm::begin(); ?>
	
	<?=$form->field( $model,'title' )->textInput( [ 'maxlength' => true ] )?>
	
	<?=$form->field( $model,'h1' )->textInput( [ 'maxlength' => true ] )?>
	
	<?=$form->field( $model,'meta_key' )->textarea( [ 'maxlength' => true ] )?>
	
	<?=$form->field( $model,'meta_desc' )->textarea( [ 'maxlength' => true ] )?>
	
	<?=$form->field( $model,'description' )->widget( CKEditor::className(),[
		'editorOptions' => ElFinder::ckeditorOptions( 'elfinder',['enterMode' => 2, 'forceEnterMode'=>false, 'shiftEnterMode'=>1  ] ),
	] );?>
	
	<?=$form->field( $model,'file' )->widget( CKEditor::className(),[
		'editorOptions' => ElFinder::ckeditorOptions( 'elfinder',['enterMode' => 2, 'forceEnterMode'=>false, 'shiftEnterMode'=>1  ] ),
	] )->label('Контент и картинки или список услуг');?>

	<?=$form->field( $model,'options' )->dropDownList( [
		'1' => 'На странице услуги',
		'2' => 'Везде',
		'0' => 'Отключен'
	],
		[ 'prompt' => 'Выберите отображение' ] );?>
	
	<?=$form->field( $model,'portfolio' )->widget( Select2::classname(),[
		'data'          => $por,
		'language'      => 'ru',
		'options'       => [ 'multiple' => true,'placeholder' => 'Выберите портфолио' ],
		'pluginOptions' => [
			'tags'       => true,
			'allowClear' => true,
			'multiple'   => true,
		],
	] );?>
	
	<?=$form->field( $model,'feedback' )->widget( Select2::classname(),[
		'data'          => $feed,
		'language'      => 'ru',
		'options'       => [ 'multiple' => true,'placeholder' => 'Выберите отзыв' ],
		'pluginOptions' => [
			'tags'       => true,
			'allowClear' => true,
			'multiple'   => true,
		],
	] );?>
	
	<?=$form->field( $model,'href' )->hiddenInput( [ 'rows' => 6 ] )->label(false)?>
	
	<?=$form->field( $model,'position' )->textInput( [ 'maxlength' => true, 'type' => 'number','min' => 1])?>
	
	<?=$form->field($model, 'img')->widget(InputFile::className(), [
		'language'      => 'ru',
		'controller'    => 'elfinder', // вставляем название контроллера, по умолчанию равен elfinder
		'filter'        => 'image',    // фильтр файлов, можно задать массив фильтров https://github.com/Studio-42/elFinder/wiki/Client-configuration-options#wiki-onlyMimes
		'template'      => '<div class="input-group">{input}<span class="input-group-btn">{button}</span></div>',
		'options'       => ['class' => 'form-control img'],
		'buttonOptions' => ['class' => 'btn btn-default'],
		'multiple'      => false       // возможность выбора нескольких файлов
	]);?>
	
	<?=$form->field( $model,'slug' )->hiddenInput( [ 'maxlength' => true ] )->label(false)?>

	<div class="form-group">
		<?=Html::submitButton( Yii::t( 'service','Save' ),[ 'class' => 'btn btn-success' ] )?>
	</div>
	
	<?php ActiveForm::end(); ?>

</div>
