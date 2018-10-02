<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\LangingPage */

$this->title = 'Добавить Langing Page';
$this->params['breadcrumbs'][] = ['label' => 'Langing Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="langing-page-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
