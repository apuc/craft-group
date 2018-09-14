<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\portfolio\models\Portfolio */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('portfolio', 'Portfolio'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portfolio-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('portfolio', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('portfolio', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('portfolio', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'h1',
            'meta_key',
            'meta_desc',
            [
                'attribute' => 'description',
                'format' => 'html',
                'value' => function ($model) {
                    return $model->description;
                }
            ],
            'stock:ntext',
            'href:ntext',
            'options',
            [
                'attribute' => 'compressing_image',
                'value' => function ($model) {
                    return ($model->compressing_image) ? 'Да' : 'Нет';
                }
            ],
            [
                'attribute' => 'compressing_image',
                'value' => function ($model) {
                    return ($model->compressing_image) ? 'Да' : 'Нет';
                }
            ],
            'slug',
        ],
    ]) ?>

</div>
