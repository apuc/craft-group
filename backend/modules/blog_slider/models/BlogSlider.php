<?php

namespace backend\modules\blog_slider\models;

use Yii;

/**
 * This is the model class for table "blog_slider".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $file
 * @property string $class
 */
class BlogSlider extends \common\models\BlogSlider
{
	public function behaviors() {
		return [
			'slug' => [
				'class'         => 'common\behaviors\Slug',
				'in_attribute'  => 'title',
				'out_attribute' => 'slug',
				'translit'      => true
			],
		];
	}
}
