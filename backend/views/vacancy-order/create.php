<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\VacancyOrder */

$this->title = 'Create Vacancy Order';
$this->params['breadcrumbs'][] = ['label' => 'Vacancy Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vacancy-order-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
