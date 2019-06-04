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
			'dt_add',
			//'description:ntext',
			//'stock:ntext',
			//'href:ntext',
//			'options',
			//'file',
			//'slug',
			
			['class' => 'yii\grid\ActionColumn'],
		],
	]); ?>
</div>
