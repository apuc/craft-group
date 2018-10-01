<?php

use himiklab\thumbnail\EasyThumbnailImage;
use yii\helpers\Url;

$home = (Url::home(true));
$pathFile = Yii::$app->resizeImage->resizeImage($value->file);
$image = Yii::$app->resizeImage->getImageSize($value->file);

echo EasyThumbnailImage::thumbnailImg(
	$home.$pathFile,
    $image->getWidth(),
    $image->getHeight(),
	EasyThumbnailImage::THUMBNAIL_OUTBOUND);