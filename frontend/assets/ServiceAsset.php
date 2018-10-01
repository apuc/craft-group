<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 12.09.18
 * Time: 10:32
 */

namespace frontend\assets;

class ServiceAsset extends FrontAsset
{
	public $js = [
		'js/allservices.js'
	];

	public $depends = [
		'frontend\assets\CommonAsset',
	];
}