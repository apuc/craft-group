<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\TagsOpengraph */

$this->title = 'Create Tags Opengraph';
$this->params['breadcrumbs'][] = ['label' => 'Tags Opengraphs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tags-opengraph-create">

	<?= $this->render('_form', [
		'model' => $model,
	]) ?>

</div>
