<?php
/**
 * Created by PhpStorm.
 * User: Neo
 * Date: 03.09.2018
 * Time: 15:38
 */

namespace frontend\assets;

use yii\web\AssetBundle;


class PortfolioAsset extends AssetBundle
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
		'https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.1/photoswipe.min.css',
		'https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.1/default-skin/default-skin.min.css',
	];
	public $js = [
//    	'js/jquery-3.2.1.min.js',
		'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.js',
		'https://assets.pinterest.com/js/pinit.js',
		'js/slick.min.js',
		'js/jquery.dotdotdot.js',
		'https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.1/photoswipe.min.js',
		'https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.1/photoswipe-ui-default.min.js',
		'js/PhotoSw.js',
//	    'js/fine-uploader.min.js',
		'js/jquery.inputmask.bundle.js',
		'js/phone.js',
		'js/phone-ru.js',
		'js/imagesloaded.pkgd.min.js',
		'js/masonry.pkgd.min.js',
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