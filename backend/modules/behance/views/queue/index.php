<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;

$this->title = 'Опции';



?>

<h3>Добавить работы в очередь</h3>

<div class="behance-work-form">



    <?php $form = ActiveForm::begin(["action"=>"add-work"]); ?>

    <?= $form->field($model, 'work_id')->dropDownList($works); ?>

    <?= $form->field($model, 'likes_count')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Добавить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>


</div>

<?= GridView::widget([
    'dataProvider' => $provider,
    'columns' => [
        [
                'class' => 'yii\grid\SerialColumn',
            'header'=>'Номер в очереди'

        ],

        [
                'attribute'=>'work_id',
                'value'=>function($data){
                    return $data->work["url"];
                }
        ],
        'likes_count'

      //  ['class' => 'yii\grid\ActionColumn'],
    ],
]); ?>
