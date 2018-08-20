<?php

namespace backend\modules\service\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "service".
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
 */
class Service extends \common\models\Service
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
