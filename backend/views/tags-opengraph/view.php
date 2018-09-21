<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\TagsOpengraph */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Tags Opengraphs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tags-opengraph-view">

	<h1><?= Html::encode($this->title) ?></h1>

	<p>
		<?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
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
			'page',
			'key',
			'title',
			'description',
			[
				'attribute' => 'image',
				'format' => 'html',
				'value' => function ($model) {
					return Html::img($model->image, ['style' => 'max-width:100%']);
				}
			],
			[
				'attribute' => 'created_at',
				'value' => function ($model) {
					return Yii::$app->formatter->asDate($model->created_at, 'yyyy-MM-dd');
				}
			],
			[
				'attribute' => 'updated_at',
				'value' => function ($model) {
					return Yii::$app->formatter->asDate($model->updated_at, 'yyyy-MM-dd');
				}
			],
		],
	]) ?>

</div>
