<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "key_value".
 *
 * @property int $id
 * @property string $key
 * @property string $value
 * @property int $dt_add
 */
class KeyValue extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'key_value';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['key', 'value'], 'required'],
			[['value'], 'string'],
			[['dt_add'], 'integer'],
			[['key'], 'string', 'max' => 255],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => Yii::t('seo', 'ID'),
			'key' => Yii::t('seo', 'Key'),
			'value' => Yii::t('seo', 'Value'),
			'dt_add' => Yii::t('seo', 'Dt Add'),
		];
	}

	static public function setValue($key, $value)
	{
		$result = self::find()->where(['like', 'key', $key])->one();
		if (strripos($key, '_count')) {
			if (!intval($value)) {
				return false;
			}
		}
		if (!$result) {
			if (strripos($key, '_count')) {
				if (!intval($value)) {
					return false;
				}
			}
			$result = new KeyValue();
			$result->key = $key;
			$result->value = $value;
			$result->dt_add = time();
			$result->save();
		} else {
			$result->value = $value;
			$result->save();
		}
		return true;
	}

	static public function getValue($key, $val = null)
	{
		$result = self::find()->where(['like', 'key', $key])->one();
		if (!$result) {
			if ($val !== null) {
				return $val;
			}
			return false;
		}
		return $result->value;
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
