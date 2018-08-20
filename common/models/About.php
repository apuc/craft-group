<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "about".
 *
 * @property int $id
 * @property string $title
 * @property string $h1
 * @property string $meta_key
 * @property string $meta_desc
 * @property string $description
 * @property string $href
 * @property string $file
 * @property int $options
 */
class About extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'about';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['description', 'href', 'file'], 'string'],
            [['h1', 'meta_key', 'meta_desc', 'description', 'href', 'file', 'options'], 'safe'],
            [['title', 'h1', 'meta_key', 'meta_desc'], 'string', 'max' => 255],
            [['options'], 'string', 'max' => 3],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('about', 'ID'),
            'title' => Yii::t('about', 'Title'),
            'h1' => Yii::t('about', 'H1'),
            'meta_key' => Yii::t('about', 'Meta Key'),
            'meta_desc' => Yii::t('about', 'Meta Desc'),
            'description' => Yii::t('about', 'Description'),
            'href' => Yii::t('about', 'Href'),
            'file' => Yii::t('about', 'File'),
            'options' => Yii::t('about', 'Options'),
        ];
    }
}
