<?php

namespace backend\modules\myths\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "myths".
 *
 * @property int $id
 * @property string $title
 * @property string $h1
 * @property string $meta_key
 * @property string $meta_desc
 * @property string $description
 * @property string $file
 * @property string $slug
 * @property int $dt_add
 */
class Myths extends \common\models\Myths
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
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'myths';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['dt_add'], 'integer'],
            [['title', 'h1', 'meta_key', 'meta_desc', 'file', 'slug'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('myths', 'ID'),
            'title' => Yii::t('myths', 'Title'),
            'h1' => Yii::t('myths', 'H1'),
            'meta_key' => Yii::t('myths', 'Meta Key'),
            'meta_desc' => Yii::t('myths', 'Meta Desc'),
            'description' => Yii::t('myths', 'Description'),
            'file' => Yii::t('myths', 'File'),
            'slug' => Yii::t('myths', 'Slug'),
            'dt_add' => Yii::t('myths', 'Dt Add'),
        ];
    }
}
