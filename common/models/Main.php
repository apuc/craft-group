<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "main".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $file
 * @property int $dt_add
 */
class Main extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'main';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        	[['name'], 'required'],
            [['description'], 'string'],
            [['dt_add'], 'integer'],
            [['name', 'file'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('main', 'ID'),
            'name' => Yii::t('main', 'Name'),
            'description' => Yii::t('main', 'Description'),
            'file' => Yii::t('main', 'File'),
            'dt_add' => Yii::t('main', 'Dt Add'),
        ];
    }
}
