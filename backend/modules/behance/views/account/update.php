<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\behance\models\BehanceAccount */

$this->title = 'Update Behance Account: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Behance Accounts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="behance-account-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
