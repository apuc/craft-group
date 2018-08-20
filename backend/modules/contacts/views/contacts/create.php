<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\contacts\models\Contacts */

$this->title = Yii::t('contacts', 'Create Contacts');
$this->params['breadcrumbs'][] = ['label' => Yii::t('contacts', 'Contacts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contacts-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
