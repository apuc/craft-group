<?php

use himiklab\thumbnail\EasyThumbnailImage;
use yii\helpers\Url;

$home = (Url::home(true));
if(file_exists($value->file))
{
    $pathFile = Yii::$app->resizeImage->resizeImage($value->file);
    $image = Yii::$app->resizeImage->getImageSize($value->file);
} else {
    $pathFile = Yii::$app->resizeImage->resizeImage('/uploads/global/unknown2.png');
    $image = Yii::$app->resizeImage->getImageSize('/uploads/global/unknown2.png');
}


echo EasyThumbnailImage::thumbnailImg(
	$home.$pathFile,
    500,
    500,
	EasyThumbnailImage::THUMBNAIL_OUTBOUND);