<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\VacancyOrder */

$this->title = 'Обновить заявку на вакансию';
$this->params['breadcrumbs'][] = ['label' => 'Vacancy Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="vacancy-order-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
