<?php

namespace backend\modules\portfolio\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "portfolio".
 *
 * @property int $id
 * @property string $title
 * @property string $h1
 * @property string $meta_key
 * @property string $meta_desc
 * @property string $description
 * @property string $stock
 * @property string $href
 * @property string $class
 * @property string $file
 * @property string $slug
 */
class Portfolio extends \common\models\Portfolio
{
	public function behaviors() {
		return [
			'slug' => [
				'class'         => 'common\behaviors\Slug',
				'in_attribute'  => 'title',
				'out_attribute' => 'slug',
				'translit'      => true
			],
			'timestamp' => [
				'class' => 'yii\behaviors\TimestampBehavior',
				'attributes' => [
					ActiveRecord::EVENT_BEFORE_INSERT => ['dt_add'],
					ActiveRecord::EVENT_BEFORE_UPDATE => ['dt_add'],
				],
			],
		];
	}
}
