<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\feedback\models\Feedback */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Feedbacks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
Yii::setAlias('@files', \yii\helpers\Url::to('/', true) . 'uploads/feedback');
?>
<div class="feedback-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']); ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Удалить отзыв',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'name',
            'phone',
            'email:email',
            'site',
            'message:ntext',
            [
                'attribute' => 'status',
                'value' => function ($model) {
                    return ($model->status) ? "Активен" : "Не активен";
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

                    if(isset($model->files))
                    {
                        $txt .= Html::a(
                            $model->files->name,
                            Yii::getAlias('@files/' . $model->files->name),
                            ['target' => '_blank']
                        );

                    }

                        $txt .= '<br>';


                    return $txt;
                }
            ]
        ],
    ]) ?>

</div>
