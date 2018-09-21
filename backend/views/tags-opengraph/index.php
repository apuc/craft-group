<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TagsOpengraphSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tags Opengraphs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tags-opengraph-index">

	<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

	<p>
		<?= Html::a('Создат тег og', ['create'], ['class' => 'btn btn-success']) ?>
	</p>

	<?= GridView::widget([
		'dataProvider' => $dataProvider,
		'filterModel' => $searchModel,
		'columns' => [
			['class' => 'yii\grid\SerialColumn'],
			
			'page',
			'key',
			'title',
			'description',
			[
				'attribute' => 'image',
				'format' => 'html',
				'value' => function ($model) {
					return Html::img(\yii\helpers\Url::to($model->image));
				}
			],
			//'created_at',
			//'updated_at',

			['class' => 'yii\grid\ActionColumn'],
		],
	]); ?>
</div>
