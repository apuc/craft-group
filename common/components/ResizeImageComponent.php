<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 12.09.18
 * Time: 14:42
 */

namespace common\components;


use tpmanc\imagick\Imagick;
use yii\base\Component;
use yii\helpers\FileHelper;

class ResizeImageComponent extends Component
{
	private $name;

	public function resizeImage($file)
	{
		$pathToImage = $this->getPathToImage($file);

		$this->setName($pathToImage);

		$pathToDirThumbnail = \Yii::getAlias('@frontend/web/uploads/thumbnail/component');
		FileHelper::createDirectory($pathToDirThumbnail);

		$pathToThumbnail = $pathToDirThumbnail . '/' . $this->decode($this->name);

		if (!$this->issetImage($pathToImage)) return $file;

		$image = Imagick::open($pathToImage);

		if ($image->getWidth() > 500) {
			if (!$this->issetImage($pathToThumbnail)) {
				$image->resize(500, false)->saveTo($pathToThumbnail);
			}
			return \Yii::getAlias('@web') . '/uploads/thumbnail/component/' . $this->name;
		} else {
			return $file;
		}
	}

	public function getImageSize($file)
	{
		$pathToImage = $this->getPathToImage($file);
		if (!$this->issetImage($pathToImage)) return $file;
		$image = Imagick::open($pathToImage);
		return $image;
	}

	private function getPathToImage($file)
	{
		return \Yii::getAlias('@frontend') . '/web' . $this->decode($file);
	}

	private function issetImage($pathToImage)
	{
		return file_exists($pathToImage);
	}

	private function getExtension($pathToImage)
	{
		return pathinfo($pathToImage, PATHINFO_EXTENSION);
	}

	private function setName($pathToImage)
	{
		$this->name = basename($pathToImage);
	}

	private function decode($str)
	{
		return rawurldecode($str);
	}
}