<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\LandingAsset */

$this->title = 'JS/CSS';
$this->params['breadcrumbs'][] = ['label' => 'Landing Assets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="landing-asset-create">

    <h1><?= "Добавить JS/CSS" ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'pages' => $pages,
    ]) ?>

</div>
