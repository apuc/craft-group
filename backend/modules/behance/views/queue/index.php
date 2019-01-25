<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use kartik\select2\Select2;
$this->title = 'Опции';



?>

<h3>Добавить работы в очередь</h3>

<div class="behance-work-form">



    <?php $form = ActiveForm::begin(["action"=>"add-work"]); ?>



    <?= $form->field($model, 'work_id')->widget(Select2::className(),
        [
            'data' => $works,
            'options' => [
                'multiple' => false,
                'placeholder' => 'Выбери категорию',
                'class' => ['form-control','jsHint'],
                'size' => '1'
            ],


        ]) ?>

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
            'label'=>'Картинка',
            'format'=>'raw',
            'value'=>function($data){
                return Html::img($data->work["preview"],["width"=>100]);
            }
        ],
        [
                'attribute'=>'work_id',
                'value'=>function($data){
                    return $data->work["name"]." | ". $data->work->account["title"];
                }
        ],
        [
            'attribute'=>'work_id',
            'format'=>'raw',
            'value'=>function($data){
                return Html::a($data->work["url"],$data->work["url"]);
            }
        ],
        'likes_count',

        ['class' => 'yii\grid\ActionColumn',
            'template'=>'{delete}'

        ],
    ],
]); ?>
