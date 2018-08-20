<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\blog_slider\models\BlogSlider */

$this->title = Yii::t('blog', 'Create Blog Slider');
$this->params['breadcrumbs'][] = ['label' => Yii::t('blog', 'Blog Sliders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blog-slider-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
