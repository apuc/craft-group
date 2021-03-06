<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\behance\models\BehanceAccountSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Аккаунты Behance';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="behance-account-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить аккаунт', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            'url:url',
            'title',
            [
                    'value'=>function($data){
                        $arr = explode("/",$data->url);
                        $user = end($arr);
                       return Html::a("Получить работы","/secureadminpage/behance/account/parse?user=".$user,["class"=>"btn btn-success"]);
                    },
                'format'=>'raw'
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
