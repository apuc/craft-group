<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\VacancyOrder */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Vacancy Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
Yii::setAlias('@files', \yii\helpers\Url::to('/', true) . 'uploads/vacancy_order');
?>
<div class="vacancy-order-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить заявку на вакансию?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'phone',
            'email:email',
            'skype',
            'message:ntext',
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

</div>
