<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "vacancy_order".
 *
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string $skype
 * @property string $message
 *
 * @property Files[] $files
 */
class VacancyOrder extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vacancy_order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['message'], 'string'],
            [['name', 'phone', 'email', 'skype'], 'string', 'max' => 255],
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
            'phone' => 'Phone',
            'email' => 'Email',
            'skype' => 'Skype',
            'message' => 'Message',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFiles()
    {
        return $this->hasMany(Files::className(), ['vacancy_order_id' => 'id']);
    }
}
