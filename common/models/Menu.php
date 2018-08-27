<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "menu".
 *
 * @property int $id
 * @property string $title
 * @property string $href
 * @property int $dt_add
 * @property int $position
 * @property string $page
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'menu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'page'], 'required'],
            [['href'], 'string'],
            [['dt_add', 'position'], 'integer'],
            [['title', 'page'], 'string', 'max' => 255],
//            [['title'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('menu', 'ID'),
            'title' => Yii::t('menu', 'Title'),
            'href' => Yii::t('menu', 'Href'),
            'dt_add' => Yii::t('menu', 'Dt Add'),
            'position' => Yii::t('menu', 'Position'),
            'page' => Yii::t('menu', 'Page'),
        ];
    }
	
	public function afterSave($insert, $changedAttributes){
		parent::afterSave($insert, $changedAttributes);
		if(Yii::$app->cache->flush()){
			Yii::$app->session->setFlash('success', 'Кэш очищен');
		} else {
			Yii::$app->session->setFlash('error', 'Ошибка');
		}
		return false;
	}
}
