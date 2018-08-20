<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Myths */

$this->title = Yii::t('myths', 'Create Myths');
$this->params['breadcrumbs'][] = ['label' => Yii::t('myths', 'Myths'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="myths-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
