<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "files".
 *
 * @property int $id
 * @property string $name
 * @property int $order_id
 * @property int $feedback_id
 * @property int $vacancy_order_id
 *
 * @property Feedback $feedback
 * @property Order $order
 * @property VacancyOrder $vacancyOrder
 */
class Files extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'files';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id', 'feedback_id', 'vacancy_order_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['feedback_id'], 'exist', 'skipOnError' => true, 'targetClass' => Feedback::className(), 'targetAttribute' => ['feedback_id' => 'id']],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Order::className(), 'targetAttribute' => ['order_id' => 'id']],
            [['vacancy_order_id'], 'exist', 'skipOnError' => true, 'targetClass' => VacancyOrder::className(), 'targetAttribute' => ['vacancy_order_id' => 'id']],
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
            'order_id' => 'Order ID',
            'feedback_id' => 'Feedback ID',
            'vacancy_order_id' => 'Vacancy Order ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFeedback()
    {
        return $this->hasOne(Feedback::className(), ['id' => 'feedback_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Order::className(), ['id' => 'order_id']);
    }
	
	public function afterSave($insert, $changedAttributes){
		parent::afterSave($insert, $changedAttributes);
		if(Yii::$app->cache->flush()){
			Yii::$app->session->setFlash('success', 'Кэш очищен');
		} else {
			Yii::$app->session->setFlash('error', 'Ошибка');
		}
		return false;
	}

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVacancyOrder()
    {
        return $this->hasOne(VacancyOrder::className(), ['id' => 'vacancy_order_id']);
    }
}
