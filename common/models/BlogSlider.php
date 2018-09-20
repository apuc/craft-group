<?php

namespace common\models;

use himiklab\sitemap\behaviors\SitemapBehavior;
use Yii;
use yii\helpers\Url;

/**
 * This is the model class for table "blog_slider".
 *
 * @property int $id
 * @property string $title
 * @property string $h1
 * @property string $meta_key
 * @property string $meta_desc
 * @property string $href
 * @property string $description
 * @property string $preview_text
 * @property string $file
 * @property int $options 0 - off, 1 - main, 2 - all
 * @property string $slug
 * @property string $date
 */
class BlogSlider extends \yii\db\ActiveRecord
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
		return 'blog_slider';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['title'], 'required'],
			[['href', 'description'], 'string'],
			[['date', 'h1', 'meta_key', 'meta_desc', 'href', 'description', 'file', 'options', 'slug'], 'safe'],
			[['title', 'h1', 'meta_key', 'meta_desc', 'file', 'slug'], 'string', 'max' => 255],
			[['preview_text'], 'string', 'max' => 220],
			[['options'], 'integer'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => Yii::t('blog', 'ID'),
			'title' => Yii::t('blog', 'Title'),
			'h1' => Yii::t('blog', 'H1'),
			'meta_key' => Yii::t('blog', 'Meta Key'),
			'meta_desc' => Yii::t('blog', 'Meta Desc'),
			'href' => Yii::t('blog', 'Href'),
			'description' => Yii::t('blog', 'Description'),
			'file' => Yii::t('blog', 'File'),
			'options' => Yii::t('blog', 'Options'),
			'slug' => Yii::t('blog', 'Slug'),
			'date' => Yii::t('blog', 'Date'),
			'preview_text' => 'Превью текста',
		];
	}

	static function getTime($time)
	{
		$month_name =
			array(1 => 'января',
				2 => 'февраля',
				3 => 'марта',
				4 => 'апреля',
				5 => 'мая',
				6 => 'июня',
				7 => 'июля',
				8 => 'августа',
				9 => 'сентября',
				10 => 'октября',
				11 => 'ноября',
				12 => 'декабря'
			);

		$month = $month_name[date('n', $time)];

		$day = date('j', $time);
		$year = date('Y', $time);
		$hour = date('G', $time);
		$min = date('i', $time);

		$date = $day . ' ' . $month . ' ' . $year . ' г. в ' . $hour . ':' . $min;

		$dif = time() - $time;

		if ($dif < 59) {
			return $dif . " сек. назад";
		} elseif ($dif / 60 > 1 and $dif / 60 < 59) {
			return round($dif / 60) . " мин. назад";
		} elseif ($dif / 3600 > 1 and $dif / 3600 < 23) {
			return round($dif / 3600) . " час. назад";
		} else {
			return $date;
		}
	}

	/**
	 * обрезание строки
	 * @param int $length
	 * @return string
	 */
	public function strCrop($length = 80)
	{
		$str = ($this->preview_text) ? $this->preview_text : $this->description;
		$str = strip_tags($str);
		return iconv_substr($str, 0, $length, 'UTF-8');
	}

	private function getScope()
	{
		return self::find()->select(['slug', 'date'])->andWhere(['options' => 1]);
	}

	private function getDataClosure()
	{
		return [
			'loc' => Url::to(['/blog/blog/single-blog', 'slug' => $this->slug], true),
			'lastmod' => $this->date,
			'changefreq' => SitemapBehavior::CHANGEFREQ_DAILY,
			'priority' => 1
		];
	}
}
