<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\LpOption */

$this->title = 'Обновить опцию';
$this->params['breadcrumbs'][] = ['label' => 'Lp Options', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lp-option-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'pages' => $pages,

    ]) ?>

</div>
