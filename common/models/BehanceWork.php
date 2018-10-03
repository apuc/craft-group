<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "behance_works".
 *
 * @property int $id
 * @property int $account_id
 * @property string $url
 */
class BehanceWork extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'behance_works';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['account_id'],'required'],
            [['url'], 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'account_id' => 'Aккаунт рабты',
            'url' => 'URL работы',
        ];
    }



}
