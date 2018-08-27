<?php

use mihaildev\elfinder\InputFile;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\KeyValue */
/* @var $form yii\widgets\ActiveForm */
/* @var $key string */
/* @var $type string */
$title = stristr($key, '_', true) ?? '';
$this->title = Yii::t('seo', $title ?? $_GET['slug']);
$type = isset($type) ? $type : 'text';
?>

<div class="key-value-form">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(['method' => 'post', 'action' => 'save']); ?>

    <?= $form->field($model, 'key')->textInput(['maxlength' => true, 'value' => $key ?? '']) ?>

    <?php if ($type === 'text'): ?>
        <?= $form->field($model, 'value')->textarea(['rows' => 6, 'value' => \common\models\KeyValue::getValue($key) ?? '']) ?>
    <?php endif; ?>
    <?php if ($type === 'img'): ?>
        <?= $form->field($model, 'value')->widget(InputFile::className(), [
            'language' => 'ru',
            'controller' => 'elfinder', // вставляем название контроллера, по умолчанию равен elfinder
            'filter' => 'image',    // фильтр файлов, можно задать массив фильтров https://github.com/Studio-42/elFinder/wiki/Client-configuration-options#wiki-onlyMimes
            'template' => '<div class="input-group">{input}<span class="input-group-btn">{button}</span></div>',
            'options' => [
                'class' => 'form-control img',
                'value' => \common\models\KeyValue::getValue($key) ?? ''
            ],
            'buttonOptions' => ['class' => 'btn btn-default'],
            'multiple' => false,       // возможность выбора нескольких файлов
        ]); ?>
    <?php endif; ?>
    <?= $form->field($model, 'dt_add')->hiddenInput(['value' => time()])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('seo', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
