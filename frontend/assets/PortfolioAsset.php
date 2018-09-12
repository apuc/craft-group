<?php
/**
 * Created by PhpStorm.
 * User: Neo
 * Date: 03.09.2018
 * Time: 15:38
 */

namespace frontend\assets;

class PortfolioAsset extends FrontAsset
{
	public $css = [
		'https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.1/photoswipe.min.css',
		'https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.1/default-skin/default-skin.min.css',
		'css/photoswipe.css',
	];
	public $js = [
		'https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.1/photoswipe.min.js',
		'https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.1/photoswipe-ui-default.min.js',
		'js/PhotoSw.js',
		'js/masonry.pkgd.min.js',
		'js/imagesloaded.pkgd.min.js',
	];
	public $depends = [
		'frontend\assets\CommonAsset',
	];
}