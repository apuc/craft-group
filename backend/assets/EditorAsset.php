<?php
/**
 * Created by PhpStorm.
 * User: kirill
 * Date: 25.01.19
 * Time: 14:58
 */

namespace backend\assets;


use yii\web\AssetBundle;

class EditorAsset extends AssetBundle
{
    public $sourcePath = '@backend/web/editor';

    public $js = [
        'ckeditor.js',
        'js.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
    ];
}