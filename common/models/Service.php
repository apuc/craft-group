<?php

namespace common\models;

use himiklab\sitemap\behaviors\SitemapBehavior;
use Yii;
use yii\db\ActiveRecord;
use yii\helpers\Url;

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
 * @property string $portfolio
 * @property string $href
 * @property string $slug
 * @property string $feedback
 * @property int $dt_add
 * @property int $position
 */
class Service extends \yii\db\ActiveRecord {
	/**
	 * @inheritdoc
	 */
	public function behaviors()
	{
		return [
			'slug' => [
				'class'         => 'common\behaviors\Slug',
				'in_attribute'  => 'title',
				'out_attribute' => 'slug',
				'translit'      => true
			],
			'sitemap' => [
				'class' => SitemapBehavior::className(),
				'scope' => function ($model) {
					/** @var \yii\db\ActiveQuery $model */
					$model->select(['slug', 'dt_add']);
//					$model->andWhere(['options' => 1]);
					$model->andWhere(['options' => 2]);
				},
				'dataClosure' => function ($model) {
					/** @var self $model */
					return [
						'loc' => Url::to(['/service/service/single-service', 'slug'=> $model->slug], true),
						'lastmod' => date('Y-m-d H:i:s', $model->dt_add),
						'changefreq' => SitemapBehavior::CHANGEFREQ_DAILY,
						'priority' => 1
					];
				}
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
	
	
	public static function tableName() {
		return 'service';
	}
	
	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [
			[ [ 'title','options' ],'required' ],
			[ [ 'h1','meta_key','meta_desc','file','description','portfolio','href','slug','options', 'feedback', 'dt_add', 'position'],'safe' ],
			[ [ 'file','description','href' ],'string' ],
			[ [ 'title','h1','meta_key','meta_desc','slug' ],'string','max' => 255 ],
			[ [ 'options'],'string','max' => 3 ],
			[['position'],'string', 'max' => 11]
		];
	}
	
	/**
	 * @inheritdoc
	 */
	public function attributeLabels() {
		return [
			'id'          => Yii::t( 'service','ID' ),
			'title'       => Yii::t( 'service','Title' ),
			'h1'          => Yii::t( 'service','H1' ),
			'meta_key'    => Yii::t( 'service','Meta Key' ),
			'meta_desc'   => Yii::t( 'service','Meta Desc' ),
			'file'        => Yii::t( 'service','File' ),
			'description' => Yii::t( 'service','Description' ),
			'options'     => Yii::t( 'service','Options' ),
			'portfolio'   => Yii::t( 'service','Portfolio' ),
			'href'        => Yii::t( 'service','Href' ),
			'slug'        => Yii::t( 'service','Slug' ),
			'dt_add'        => Yii::t( 'service','Date' ),
			'position'        => Yii::t( 'service','Position' ),
		];
	}
	
	public function getPortfolio() {
		return json_decode( $this->portfolio );
	}
	
	public function setPortfolio( $value ) {
		$this->portfolio = json_encode( $value );
	}
	
	
	public function getFeedback() {
		return json_decode( $this->feedback);
	}
	
	public function setFeedback( $value ) {
		$this->feedback = json_encode( $value );
	}
	
	public function beforeSave( $insert ) {
		if ( parent::beforeSave( $insert ) ) {
			$this->portfolio = json_encode( $this->portfolio );
			$this->feedback = json_encode( $this->feedback );
			return true;
		}
		return false;
	}
	
	public function afterFind() {
		$this->portfolio = json_decode($this->portfolio);
		$this->feedback = json_decode($this->feedback);
		return true;
	}
}
