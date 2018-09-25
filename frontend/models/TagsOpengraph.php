<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 21.09.18
 * Time: 9:56
 */

namespace frontend\models;


use Yii;

class TagsOpengraph extends \common\models\TagsOpengraph
{
	/**
	 * регистрация og tags
	 * @param string $url
	 */
	public function registerOGTags($url)
	{
		Yii::$app->og->registerTags(
			$this->title,
			$this->description,
			$this->image,
			$url
		);
	}
}