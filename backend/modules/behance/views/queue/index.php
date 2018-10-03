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

    <div class="form-group">
        <?= Html::label("Выберите работу") ?>
        <?php echo Html::dropDownList("work",[],$works)?>
    </div>


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

      //  ['class' => 'yii\grid\ActionColumn'],
    ],
]); ?>
