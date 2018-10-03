<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\LangingPage */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Langing Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="langing-page-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'slug',
            'content:ntext',
            [
                'attribute'=>'dt_add',
                'value'=>function($val){
                    return date("d:m:Y",$val->dt_add);
                }

            ],
            [
                'attribute'=>'dt_update',
                'value'=>function($val){
                    return date("d:m:Y",$val->dt_add);
                }

            ],
            [
                'attribute'=>'status',
                'value'=>function($val){
                    return ($val->status == 0) ? "не отображать" : "отображать";
                }

            ],
        ],
    ]) ?>

</div>
