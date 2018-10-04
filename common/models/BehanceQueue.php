<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "behance_queue".
 *
 * @property int $id
 * @property int $work_id
 * @property int $likes_count
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
            [['work_id','likes_count'], 'required'],
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
            'likes_count'=>'Количество лайков'
        ];
    }
}
