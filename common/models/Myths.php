<?php

namespace common\models;

use himiklab\sitemap\behaviors\SitemapBehavior;
use Yii;
use yii\db\ActiveRecord;
use yii\helpers\Url;
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
 * @property int $options
 */
class Myths extends \yii\db\ActiveRecord
{
	public function behaviors()
	{
		return [
			'sitemap' => [
				'class' => SitemapBehavior::className(),
				'scope' => function ($model) {
					/** @var \yii\db\ActiveQuery $model */
					$model->select(['slug', 'dt_add']);
					$model->andWhere(['options' => 1]);
				},
				'dataClosure' => function ($model) {
					/** @var self $model */
					return [
						'loc' => Url::to(['/myths/myths/single-myths', 'slug'=> $model->slug], true),
						'lastmod' => $model->date,
						'changefreq' => SitemapBehavior::CHANGEFREQ_DAILY,
						'priority' => 1
					];
				}
			],
			'slug' => [
				'class'         => 'common\behaviors\Slug',
				'in_attribute'  => 'title',
				'out_attribute' => 'slug',
				'translit'      => true
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
	        [['title'], 'required'],
            [['dt_add', 'options'], 'integer'],
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
            'options' => Yii::t('myths', 'Options'),
        ];
    }
}
