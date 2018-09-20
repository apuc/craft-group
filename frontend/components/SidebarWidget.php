<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 20.09.18
 * Time: 11:09
 */

namespace frontend\components;


use common\models\BlogSlider;
use Yii;
use yii\base\Widget;
use yii\db\Expression;

class SidebarWidget extends Widget
{
	public $slug = null;
	public $lastArr = null;
	public $countSidebar;
	public $orderBy;

	const ORDER_BY_BLOG = 'blog';
	const ORDER_BY_MYTHS = 'myths';

	public function run()
	{
		$all = Yii::$app->cache->getOrSet('all' . $this->slug, function () {
			return BlogSlider::find()->where(['h1' => 'current'])->one();
		});
		$slider = Yii::$app->cache->getOrSet('slider-' . $this->slug, function () {
			$query = BlogSlider::find()
				->where(['!=', 'options', 0])
				->andWhere(['!=', 'h1', 'current']);

			if ($this->slug) {
				$query = $query->andWhere(['!=', 'slug', $this->slug]);
			}

			if ($this->lastArr) {
				$query = $query->andWhere(['not in', 'slug', $this->lastArr]);
			}

			if ($this->orderBy === self::ORDER_BY_BLOG) {
				$query = $query->orderBy(new Expression('rand()'), ['date' => SORT_DESC]);
			} elseif ($this->orderBy === self::ORDER_BY_MYTHS) {
				$query = $query->orderBy(['date' => SORT_DESC]);
			}

			return $query->limit($this->countSidebar)
				->all();
		}, 30);
		return $this->render('sidebar/sidebar', ['slider' => $slider, 'all' => $all]);
	}
}