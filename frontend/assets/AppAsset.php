<?php

namespace frontend\assets;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends FrontAsset
{
    public $css = [
	    'https://use.fontawesome.com/releases/v5.1.0/css/all.css',
	    'css/libs.min.css',
	    'css/styles.min.css',
	    'css/uploader.css',
    ];
    public $js = [
	    'js/jquery.fancybox.js',
	    'js/slick.min.js',
	    'js/jquery.dotdotdot.js',
	    'js/jquery.inputmask.bundle.js',
	    'js/phone.js',
	    'js/phone-ru.js',
	    'js/Uploader.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];
}
