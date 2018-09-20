<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 20.09.18
 * Time: 13:02
 */

namespace frontend\components;


use Yii;
use yii\base\Component;

class OpengraphComponent extends Component
{
	public function registerTags($title, $description, $image, $url, $siteName, $type){
		Yii::$app->opengraph->title = $title;
		Yii::$app->opengraph->description = $description;
		Yii::$app->opengraph->image = $image;
		Yii::$app->opengraph->url = $url;
		Yii::$app->opengraph->siteName = $siteName;
		Yii::$app->opengraph->type = $type;
	}
}