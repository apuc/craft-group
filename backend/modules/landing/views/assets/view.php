<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\LandingAsset */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Landing Assets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="landing-asset-view">



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
            [
                'attribute'=>'lp_id',
                'value'=>function($data){
                    return $data->landing["title"];
                }
            ],
            [
                'attribute'=>'type',
                'value'=>function($data){
                    return ($data->type == 0) ? "js" : "css";
                }
            ],
            'path',
        ],
    ]) ?>

</div>
