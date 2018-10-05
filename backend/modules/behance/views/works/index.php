<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\behance\models\BehanceWorkSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Работы Behance';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="behance-work-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить работу', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],


            [
                    'attribute'=>'preview',
                'format'=>'raw',
                'value'=>function($data){
                  return Html::img($data->preview,["width"=>100]);
                }
            ],
            'name',
            'url:url',
            [

                'format'=>'raw',
                'value'=>function($data){
                    return Html::a("Добавить в портфолио","/secureadminpage/portfolio/portfolio/create-from-behance?id=".$data->id,["class"=>"btn btn-success"]);
                }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
