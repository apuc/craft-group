<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 12.09.18
 * Time: 9:52
 */

namespace frontend\assets;


use yii\web\AssetBundle;

class SidebarAsset extends AssetBundle
{
	public $basePath = '@webroot';
	public $baseUrl = '@web';

	public $js = [
		'js/jquery.sticky-sidebar.js',
	];
	
	public $depends = [
		'frontend\assets\AppAsset'
	];
}