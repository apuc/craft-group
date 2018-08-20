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
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'h1',
            'meta_key',
            'meta_desc',
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
