<?php

namespace backend\modules\vacancy\models;

use Yii;

/**
 * This is the model class for table "vacancy".
 *
 * @property int $id
 * @property string $title
 * @property string $h1
 * @property string $meta_key
 * @property string $meta_desc
 * @property string $file
 * @property string $description
 * @property int $options 0 - off, 1 - main, 2 - some
 * @property string $href
 * @property string $slug
 */
class Vacancy extends \common\models\Vacancy
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
