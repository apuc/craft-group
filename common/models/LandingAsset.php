<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "landing_assets".
 *
 * @property int $id
 * @property int $lp_id
 * @property int $type
 * @property string $path
 */
class LandingAsset extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'landing_assets';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lp_id', 'type'], 'integer'],
            [['path'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lp_id' => 'Лендинг',
            'type' => 'Тип файла',
            'path' => 'Файл',
        ];
    }

    public function getLanding()
    {
       return $this->hasOne(LangingPage::className(),["id"=>"lp_id"]);
    }
}
