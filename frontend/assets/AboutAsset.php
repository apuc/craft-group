<?php
/**
 * Created by PhpStorm.
 * User: Neo
 * Date: 03.09.2018
 * Time: 15:38
 */

namespace frontend\assets;

class AboutAsset extends FrontAsset
{
	public $css = [
		'https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.1/photoswipe.min.css',
		'https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.1/default-skin/default-skin.min.css',
		'css/photoswipe.css',
	];
	public $js = [
		'js/slick.min.js',
		'js/jquery.dotdotdot.js',
		'js/jquery.fancybox.js',
		'js/jquery.inputmask.bundle.js',
		'js/jquery.sticky-sidebar.js',
		'js/sticky-script.js',
		'js/slick-feedback.js',
		'js/Uploader.js',
	];
	public $depends = [
		'frontend\assets\CommonAsset',
	];
}