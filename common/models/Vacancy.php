<?php

namespace common\models;

use himiklab\sitemap\behaviors\SitemapBehavior;
use Yii;
use yii\helpers\Url;

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
 * @property int $views
 * @property string $date
 * @property string $demands
 * @property string $conditions
 * @property string $img
 */
class Vacancy extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public function behaviors()
	{
		return [
			'sitemap' => [
				'class' => SitemapBehavior::className(),
				'scope' => $this->getScope(),
				'dataClosure' => $this->getDataClosure()
			],
		];
	}

	public static function tableName()
	{
		return 'vacancy';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['title', 'options'], 'required'],
			[['file', 'description', 'href', 'img'], 'string'],
			[['h1', 'meta_key', 'meta_desc', 'file', 'description', 'href', 'slug', 'date', 'views', 'demands', 'conditions', 'img'], 'safe'],
			[['title', 'h1', 'meta_key', 'meta_desc', 'slug'], 'string', 'max' => 255],
			[['views'], 'integer'],
			[['options'], 'string', 'max' => 3],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => Yii::t('vacancy', 'ID'),
			'title' => Yii::t('vacancy', 'Title'),
			'h1' => Yii::t('vacancy', 'H1'),
			'meta_key' => Yii::t('vacancy', 'Meta Key'),
			'meta_desc' => Yii::t('vacancy', 'Meta Desc'),
			'file' => Yii::t('vacancy', 'File'),
			'description' => Yii::t('vacancy', 'Description'),
			'options' => Yii::t('vacancy', 'Options'),
			'href' => Yii::t('vacancy', 'Href'),
			'slug' => Yii::t('vacancy', 'Slug'),
			'views' => Yii::t('vacancy', 'Views'),
			'date' => Yii::t('vacancy', 'Date'),
			'demands' => Yii::t('vacancy', 'Demands'),
			'conditions' => Yii::t('vacancy', 'Conditions'),
			'img' => Yii::t('vacancy', 'Image'),
		];
	}

	public function afterSave($insert, $changedAttributes)
	{
		parent::afterSave($insert, $changedAttributes);
		if (Yii::$app->cache->flush()) {
			Yii::$app->session->setFlash('success', 'Кэш очищен');
		} else {
			Yii::$app->session->setFlash('error', 'Ошибка');
		}
		return false;
	}

	private function getScope()
	{
		return self::find()->select(['slug', 'date'])->andWhere(['options' => 1]);
	}

	private function getDataClosure()
	{
		return [
			'loc' => Url::to(['/vacancy/vacancy/single-vacancy', 'slug' => $this->slug], true),
			'lastmod' => $this->date,
			'changefreq' => SitemapBehavior::CHANGEFREQ_DAILY,
			'priority' => 1
		];
	}
}
