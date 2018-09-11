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
	    'https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.1/photoswipe.min.css',
	    'https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.1/default-skin/default-skin.min.css',
//	    'css/photoswipe.css',
//	    'css/default-skin/default-skin.css',
	    'https://use.fontawesome.com/releases/v5.1.0/css/all.css',
	    'css/libs.min.css',
	    'css/styles.min.css',
	    'css/uploader.css',
	    'css/fine-uploader-gallery.css',
    ];
    public $js = [
//	    'js/jquery-3.2.1.min.js',
	    'js/jquery.fancybox.js',
	    'https://assets.pinterest.com/js/pinit.js',
	    'js/slick.min.js',
	    'js/jquery.dotdotdot.js',
//	    'js/fine-uploader.min.js',
	    'js/jquery.inputmask.bundle.js',
	    'js/phone.js',
	    'js/phone-ru.js',
	    'js/sticky-sidebar.js',
	    'js/imagesloaded.pkgd.min.js',
	    'js/masonry.pkgd.min.js',
	    'js/main.js',
	    'js/jquery.sticky-sidebar.js',
//	    'js/jquery.fancybox.js',
	    'js/slick-feedback.js',
	    'js/allservices.js',
	    'js/Uploader.js',
	    'js/script.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];
}
