<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "service_list".
 *
 * @property int $id
 * @property string $name
 *
 * @property OrderServiceList[] $orderServiceLists
 */
class ServiceList extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'service_list';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderServiceLists()
    {
        return $this->hasMany(OrderServiceList::className(), ['service_list_id' => 'id']);
    }
}
