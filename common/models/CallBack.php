<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "call_back".
 *
 * @property int $id
 * @property string $phone
 * @property int $dt_add
 */
class CallBack extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'call_back';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dt_add'], 'integer'],
            [['phone'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('call_back', 'ID'),
            'phone' => Yii::t('call_back', 'Phone'),
            'dt_add' => Yii::t('call_back', 'Dt Add'),
        ];
    }
}
