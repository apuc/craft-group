<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\portfolio\models\Portfolio */

$this->title = Yii::t('portfolio', 'Create Portfolio');
$this->params['breadcrumbs'][] = ['label' => Yii::t('portfolio', 'Portfolios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portfolio-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
