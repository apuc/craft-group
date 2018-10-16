<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 12.09.18
 * Time: 10:17
 */

namespace frontend\assets;

class CommonAsset extends FrontAsset
{
	public $js = [
		'js/script.min.js',
        'js/noactivitymodal.js',
		'js/main.js',
	];
	public $depends = [
		'frontend\assets\AppAsset',
	];
}