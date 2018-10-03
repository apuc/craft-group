<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Опции';


?>

<h3>Добавить адресса proxy серверов</h3>

<div class="behance-work-form">

    <?php $form = ActiveForm::begin(["action"=>"fill",'options' => array(
        'enctype' => 'multipart/form-data',
    ),]); ?>

    <div class="form-group">
        <?= Html::label("Укажите файл с адресами") ?>
        <?php echo Html::fileInput("ipfile",'',['required'=>'true'])?>
    </div>


    <div class="form-group">
        <?= Html::submitButton('Добавить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<div class="behance-work-form">

    <?php $form = ActiveForm::begin(["action"=>"save"]); ?>

    <div class="form-group">
        <?php echo Html::label("Сколько работ лайкать за раз") ?>
        <?php echo "<br>".Html::textInput('max_likes',$max_likes->value)?>
    </div>


    <div class="form-group">
        <?php echo Html::submitButton('Сохранить опции', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
