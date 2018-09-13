<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 22.08.18
 * Time: 16:23
 */

namespace frontend\components;


use common\models\BlogSlider;
use common\models\KeyValue;
use yii\base\Widget;
use yii\db\Expression;

class BlogWidget extends Widget
{
	public $curr_blog = NULL;

	public function init()
	{
		parent::init();
	}

	public function run()
	{
		parent::run();
		$cache = \Yii::$app->cache;
		$str = 'widget';

		$limit = $cache->getOrSet('view_post_in_footer-' . $str, function () {
			return KeyValue::getValue('view_post_in_footer', 5);
		});
		$b_cur = $cache->getOrSet('b_cur-' . $str, function () {
			return BlogSlider::find()->where(['h1' => 'current'])->one();
		});
		$blog = $cache->getOrSet('blog-'.$str, function () use ($limit){
			return BlogSlider::find()->where(['!=', 'h1', 'current'])->andWhere(['!=', 'slug', $this->curr_blog])->orderBy(['date' => SORT_DESC])->limit($limit)->orderBy('date desc')->all();
		});
		return $this->render('blog/blog', [
			'b_cur' => $b_cur,
			'blog' => $blog
		]);
	}

}