<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\LpOption */

$this->title = 'Добавить опцию';
$this->params['breadcrumbs'][] = ['label' => 'Lp Options', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lp-option-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'pages' => $pages,
    ]) ?>

</div>
