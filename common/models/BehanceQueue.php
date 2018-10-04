<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "behance_queue".
 *
 * @property int $id
 * @property int $work_id
 */
class BehanceQueue extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'behance_queue';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['work_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Номер в очереди',
            'work_id' => 'Работа',
        ];
    }
}
