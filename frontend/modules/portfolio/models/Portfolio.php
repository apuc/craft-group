<?php

namespace frontend\modules\portfolio\models;

use tpmanc\imagick\Imagick;
use Yii;

/**
 * Created by PhpStorm.
 * User: alex
 * Date: 10.09.18
 * Time: 14:08
 */
class Portfolio extends \backend\modules\portfolio\models\Portfolio
{
	public function getImageOriginal()
	{
		$image = Imagick::open($this->getImagePathOriginal());
		$image->resize(300, false)->saveTo($this->getImagePathThumbnail());
		return $image;
	}

	public function setImagePathOriginal($getBool = false)
	{
		$path = str_replace(basename($this->file), '', $this->file);
		$imagePathOriginal = Yii::getAlias('@frontend/web/' . $path . rawurldecode(basename($this->file)));
		$isImagePathOriginal = $this->isImagePathOriginal($imagePathOriginal);
		if ($isImagePathOriginal) {
			if ($getBool) return $isImagePathOriginal;
			return $imagePathOriginal;
		}
		if ($getBool) return $isImagePathOriginal;
		return Yii::getAlias('@frontend/web/uploads/thumbnail/blog3.png'); // TODO: вставить thumbnail заглушки
	}

	private function getImagePathOriginal()
	{
		return $this->setImagePathOriginal();
	}

	private function isImagePathOriginal($path)
	{
		return file_exists($path);
	}

	private function getImagePathThumbnail()
	{
		return ($this->setImagePathOriginal(true))
			? Yii::getAlias('@frontend/web/uploads/thumbnail/' . rawurldecode(basename($this->file)))
			: Yii::getAlias('@frontend/web/uploads/thumbnail/blog3.png');
	}

	public function getFile()
	{
		return ($this->setImagePathOriginal(true)) ? $this->file : '/images/new/blog3.png';    // TODO: вставить оригинал заглушки
	}

	public function getThumbnailUrl()
	{
		$name = ($this->setImagePathOriginal(true)) ? basename($this->file) : 'blog3.png';    // TODO: вставить название файла заглушки
		return 'uploads/thumbnail/' . $name;
	}
}