<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\portfolio\models\PortfolioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('portfolio', 'Portfolio');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portfolio-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('portfolio', 'Create Portfolio'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
	<p>
		<?= Html::a(Yii::t('portfolio', 'Count in page'), ['/seo/seo/create-in-page-portfolio' , 'slug' => 'portfolio'], ['class' => 'btn btn-success']) ?>
	</p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],


            [
                'attribute'=>'title',

                'filter'    => kartik\select2\Select2::widget([
                    'model' => $searchModel,
                    'attribute' => 'title',
                    'data' =>$titles,
                    'options' => ['placeholder' => 'Начните вводить...','class' => 'form-control'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]),
            ],
            [
                'attribute'=>'h1',

                'filter' => kartik\select2\Select2::widget([
                    'model' => $searchModel,
                    'attribute' => 'h1',
                    'data' =>$h1,
                    'options' => ['placeholder' => 'Начните вводить...','class' => 'form-control'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]),
            ],
            'meta_key',
            'meta_desc',
            [
                    'attribute' => 'dt_add',
                    'format' => 'text',
                    'value' => function($data){
                        return $data->dt_add = Yii::$app->formatter->asDate( $data->dt_add, 'd.MM.yyyy');
                    }
            ],

            //'description:ntext',
            //'stock:ntext',
            //'href:ntext',
            //'options',
            //'file',
            //'slug',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
