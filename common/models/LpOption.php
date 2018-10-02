<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "lp_options".
 *
 * @property int $id
 * @property int $lp_id
 * @property string $metka
 * @property string $key
 * @property string $value
 */
class LpOption extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lp_options';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lp_id'], 'integer'],
            [['metka', 'key', 'value'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lp_id' => 'Landing Page',
            'metka' => 'Метка',
            'key' => 'Ключ',
            'value' => 'Значение',
        ];
    }

    public function getLanding()
    {
        return $this->hasOne(LangingPage::className(),['id' => 'lp_id']);
    }
}
