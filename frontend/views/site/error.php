<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
$this->registerCssFile("@web/js/jquery.sticky-sidebar.js", ['depends' => [yii\web\YiiAsset::className()]]);
$this->registerCssFile("@web/js/sticky-script.js", ['depends' => [yii\web\YiiAsset::className()]]);
$this->registerCssFile("@web/js/slick-feedback.js", ['depends' => [yii\web\YiiAsset::className()]]);
?>

