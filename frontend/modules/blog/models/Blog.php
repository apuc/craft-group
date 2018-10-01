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
use yii\helpers\Url;

class Blog extends BlogSlider
{
	const COUNT_SHOW_POST = 9;
	const COUNT_UPLOAD_POST = 6;
	public function getImage()
	{
		return file_exists(Yii::getAlias('@frontend/web').$this->file) ? $this->file : Url::to(['@web/images/new/blog3.png']);	//TODO: вставить заглушку
	}
}