<?php

use yii\helpers\Html;

$this->title = 'Очитсить кэш';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="key-value-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Очистить', ['del-cache'], ['class' => 'btn btn-success']) ?>
    </p>

    
</div>
