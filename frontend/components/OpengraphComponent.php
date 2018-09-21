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
use yii\helpers\Url;

class OpengraphComponent extends Component
{
	public function registerTags($title, $description, $image = '', $url, $siteName = 'Craft Group', $type = 'website'){
		Yii::$app->opengraph->title = $title;
		Yii::$app->opengraph->description = $description;
		Yii::$app->opengraph->image = ($image) ? Url::to($image, true) : '';
		Yii::$app->opengraph->url = $url;
		Yii::$app->opengraph->siteName = $siteName;
		Yii::$app->opengraph->type = $type;
	}
}