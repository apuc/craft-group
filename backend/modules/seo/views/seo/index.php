<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\seo\controllers\SeoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('seo', $_GET['slug']);
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="key-value-index">

	<h1><?= Html::encode($this->title) ?></h1>
    

    <p>
        <?= Html::a(Yii::t('seo', 'Create title'), ['create-title', 'slug' => $_GET['slug']], ['class' => 'btn btn-success']) ?>
    </p>
	<p>
		<?= Html::a(Yii::t('seo', 'Create description'), ['create-desc', 'slug' => $_GET['slug']], ['class' => 'btn btn-success']) ?>
	</p>
	<p>
		<?= Html::a(Yii::t('seo', 'Create key'), ['create-key', 'slug' => $_GET['slug']], ['class' => 'btn btn-success']) ?>
	</p>
	<p>
		<?= Html::a(Yii::t('seo', 'Create og title'), ['create-og-title', 'slug' => $_GET['slug']], ['class' => 'btn btn-primary']) ?>
	</p>
	<p>
		<?= Html::a(Yii::t('seo', 'Create og description'), ['create-og-desc', 'slug' => $_GET['slug']], ['class' => 'btn btn-primary']) ?>
	</p>
	<p>
		<?= Html::a(Yii::t('seo', 'Create og type'), ['create-og-type', 'slug' => $_GET['slug']], ['class' => 'btn btn-primary']) ?>
	</p>
	<p>
		<?= Html::a(Yii::t('seo', 'Create og url'), ['create-og-url', 'slug' => $_GET['slug']], ['class' => 'btn btn-primary']) ?>
	</p>
	<p>
		<?= Html::a(Yii::t('seo', 'Create og image'), ['create-og-image', 'slug' => $_GET['slug']], ['class' => 'btn btn-primary']) ?>
	</p>
	<p>
		<?= Html::a(Yii::t('seo', 'Create og site-name'), ['create-og-site-name', 'slug' => $_GET['slug']], ['class' => 'btn btn-primary']) ?>
	</p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'key',
            'value:ntext',
            'dt_add',

//            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
