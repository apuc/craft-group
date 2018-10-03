<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\LandingAsset */

$this->title = 'Обновить файл: ' . $model->path;
$this->params['breadcrumbs'][] = ['label' => 'Landing Assets', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="landing-asset-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'pages' => $pages,
    ]) ?>

</div>
