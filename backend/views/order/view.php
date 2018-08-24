<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Order */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
Yii::setAlias('@files', \yii\helpers\Url::to('/', true) . 'uploads/order');
?>
<div class="order-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <!--        <? /*= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) */ ?>
        <? /*= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) */ ?>-->
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'phone',
            'email:email',
            'skype',
            'message:ntext',
            [
                'attribute' => 'Услуги',
                'format' => 'html',
                'value' => function ($model) {
                    /**
                     * @var $model backend\models\Order
                     */
                    $service = '';
                    if (empty($model->orderServiceLists)) return 'Услуг не заказывали';
                    foreach ($model->orderServiceLists as $item) {
                        $service .= $item->serviceList->name . ', ';
                    }
                    return $service;
                }
            ],
            [
                'attribute' => 'Файлы',
                'format' => 'raw',
                'value' => function ($model) {
                    /**
                     * @var $model backend\models\Order
                     */
                    $txt = '';

                    foreach ($model->files as $file) {
                        $txt .= Html::a(
                            $file->name,
                            Yii::getAlias('@files/' . $file->name),
                            ['target' => '_blank']
                        );

                        $txt .= '<br>';
                    }

                    return $txt;
                }
            ]
        ],
    ]) ?>

    <?= Html::a('Список заказов', \yii\helpers\Url::to(['/order']), ['class' => 'btn btn-primary']) ?>

</div>
