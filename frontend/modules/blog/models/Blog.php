<?php

/**
 * Created by PhpStorm.
 * User: alex
 * Date: 10.09.18
 * Time: 14:50
 */

namespace frontend\modules\blog\models;


use backend\modules\blog_slider\models\BlogSlider;
use Yii;

class Blog extends BlogSlider
{
	public function getImage()
	{
		return file_exists(Yii::getAlias('@frontend/web').$this->file) ? $this->file : Yii::getAlias('@web').'/uploads/thumbnail/blog3.png';	//TODO: вставить заглушку
	}
}