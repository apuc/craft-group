<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\behance\models\BehanceWork */

$this->title = 'Добавить работу';
$this->params['breadcrumbs'][] = ['label' => 'Behance Works', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="behance-work-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'accounts' => $accounts,
    ]) ?>

</div>
