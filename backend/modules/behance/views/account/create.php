<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\behance\models\BehanceAccount */

$this->title = 'Добавить Behance аккаунт';
$this->params['breadcrumbs'][] = ['label' => 'Behance Accounts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="behance-account-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
