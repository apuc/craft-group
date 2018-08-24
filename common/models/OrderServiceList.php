<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "order_service_list".
 *
 * @property int $order_id
 * @property int $service_list_id
 *
 * @property Order $order
 * @property ServiceList $serviceList
 */
class OrderServiceList extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_service_list';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id', 'service_list_id'], 'integer'],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Order::className(), 'targetAttribute' => ['order_id' => 'id']],
            [['service_list_id'], 'exist', 'skipOnError' => true, 'targetClass' => ServiceList::className(), 'targetAttribute' => ['service_list_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'order_id' => 'Order ID',
            'service_list_id' => 'Service List ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Order::className(), ['id' => 'order_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServiceList()
    {
        return $this->hasOne(ServiceList::className(), ['id' => 'service_list_id']);
    }
}
