<?php

use himiklab\thumbnail\EasyThumbnailImage;
use yii\helpers\Url;

$home = (Url::home(true));
$path = \yii\helpers\Url::to('/', true);
if(!file_exists($path .$value->file))
{
    $value->file = '/uploads/global/unknown2.png';
}
$pathFile = Yii::$app->resizeImage->resizeImage($value->file);
$image = Yii::$app->resizeImage->getImageSize($value->file);

echo EasyThumbnailImage::thumbnailImg(
	$home.$pathFile,
    500,
    500,
	EasyThumbnailImage::THUMBNAIL_OUTBOUND);