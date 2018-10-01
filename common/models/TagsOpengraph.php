<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tags_opengraph".
 *
 * @property int $id
 * @property string $page
 * @property string $title
 * @property string $description
 * @property string $image
 * @property string $key
 * @property int $created_at
 * @property int $updated_at
 */
class TagsOpengraph extends \yii\db\ActiveRecord
{

	/**
	 * {@inheritdoc}
	 */
	public static function tableName()
	{
		return 'tags_opengraph';
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules()
	{
		return [
			[['created_at', 'updated_at'], 'integer'],
			[['page', 'title', 'description', 'image', 'key'], 'string', 'max' => 255],
			[['key'], 'unique']
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'key' => 'Ключ',
			'page' => 'Страница',
			'title' => 'Заголовок',
			'description' => 'Описание',
			'image' => 'Картинка',
			'created_at' => 'Дата создания',
			'updated_at' => 'Дата обновления',
		];
	}

	public function beforeSave($insert)
	{
		if ($this->isNewRecord) {
			$this->created_at = time();
		}
		$this->updated_at = time();
		return parent::beforeSave($insert);
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
}
