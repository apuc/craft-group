<?php

namespace common\models;

use himiklab\sitemap\behaviors\SitemapBehavior;
use Yii;
use yii\db\ActiveRecord;
use yii\helpers\Url;


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
 * @property int $options 0 - off, 1 - main, 2 - service, 3 - all
 * @property string $file
 * @property string $slug
 * @property int $dt_add
 */
class Portfolio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
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
						'loc' => Url::to(['/portfolio/portfolio/single-portfolio', 'slug'=> $model->slug], true),
						'lastmod' => date('Y-m-d H:i:s', $model->dt_add),
						'changefreq' => SitemapBehavior::CHANGEFREQ_DAILY,
						'priority' => 1
					];
				}
			],
		];
	}
    
    public static function tableName()
    {
        return 'portfolio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'options'], 'required'],
            [['description', 'stock', 'href'], 'string'],
	        [['h1', 'meta_key', 'meta_desc', 'stock', 'href', 'file', 'slug', 'description', 'dt_add'], 'safe'],
            [['title'], 'string', 'max' => 80],
            [['h1', 'meta_key', 'file', 'slug'], 'string', 'max' => 255],
            [['meta_desc'], 'string', 'max' => 200],
            [['options'], 'string', 'max' => 4],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('portfolio', 'ID'),
            'title' => Yii::t('portfolio', 'Title'),
            'h1' => Yii::t('portfolio', 'H1'),
            'meta_key' => Yii::t('portfolio', 'Meta Key'),
            'meta_desc' => Yii::t('portfolio', 'Meta Desc'),
            'description' => Yii::t('portfolio', 'Description'),
            'stock' => Yii::t('portfolio', 'Stock'),
            'href' => Yii::t('portfolio', 'Href'),
            'options' => Yii::t('portfolio', 'Options'),
            'file' => Yii::t('portfolio', 'File'),
            'slug' => Yii::t('portfolio', 'Slug'),
            'dt_add' => Yii::t('portfolio', 'Date'),
        ];
    }
}
