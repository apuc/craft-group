<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
//        'css/site.css',
	    'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css',
	    'css/libs.min.css',
	    'css/styles.min.css',
	    'css/fine-uploader-gallery.css',
    ];
    public $js = [
    	'js/jquery-3.2.1.min.js',
	    'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.js',
	    'js/slick.min.js',
	    'js/jquery.dotdotdot.js',
//	    'js/fine-uploader.min.js',
	    'js/jquery.inputmask.bundle.js',
	    'js/phone.js',
	    'js/phone-ru.js',
	    'js/script.min.js',
	    'js/imagesloaded.pkgd.min.js',
	    'js/masonry.pkgd.min.js',
	    'js/main.js',
	    'js/jquery.sticky-sidebar.js',
	    'js/sticky-script.js',
	    'js/slick-feedback.js',
	    'js/allservices.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];
}
