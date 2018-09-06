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
	    'css/photoswipe.css',
	    'css/default-skin/default-skin.css',
	    'css/libs.min.css',
	    'css/styles.min.css',
	    'css/fine-uploader-gallery.css',
    ];
    public $js = [
//    	'js/jquery-3.2.1.min.js',
	    'https://assets.pinterest.com/js/pinit.js',
	    'js/slick.min.js',
	    'js/jquery.dotdotdot.js',
//	    'js/fine-uploader.min.js',
	    'js/jquery.inputmask.bundle.js',
	    'js/phone.js',
	    'js/phone-ru.js',
	    'js/imagesloaded.pkgd.min.js',
	    'js/masonry.pkgd.min.js',
	    'js/jquery.fancybox.js',
	    'js/main.js',
	    'js/jquery.sticky-sidebar.js',
	    'js/sticky-script.js',
	    'js/slick-feedback.js',
	    'js/allservices.js',
	    'js/script.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];
}
