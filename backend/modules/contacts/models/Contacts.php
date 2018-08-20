<?php

namespace backend\modules\contacts\models;

use Yii;

/**
 * This is the model class for table "contacts".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $file
 */
class Contacts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contacts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description'], 'required'],
            [['file'], 'safe'],
            [['name', 'description', 'file'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('contacts', 'ID'),
            'name' => Yii::t('contacts', 'Name'),
            'description' => Yii::t('contacts', 'Description'),
            'file' => Yii::t('contacts', 'File'),
        ];
    }
}
