<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Main */

$this->title = Yii::t('main', 'Create Main');
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Mains'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="main-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
