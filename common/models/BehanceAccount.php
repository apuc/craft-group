<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "behance_accounts".
 *
 * @property int $id
 * @property string $url
 * @property string $title
 */
class BehanceAccount extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'behance_accounts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['url', 'title'],'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'url' => 'URL аккаунта',
            'title' => 'Имя аккаунта',
        ];
    }
}
