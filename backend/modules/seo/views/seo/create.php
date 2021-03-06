<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\KeyValue */

$this->title = Yii::t('seo', 'Create Key Value');
$this->params['breadcrumbs'][] = ['label' => Yii::t('seo', 'Key Values'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="key-value-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
