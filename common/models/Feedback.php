<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "feedback".
 *
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string $site
 * @property string $message
 * @property int $status
 *
 * @property Files[] $files
 * @property string $fileName
 */
class Feedback extends \yii\db\ActiveRecord
{
    public $fileName;

    const STATUS_NAME_ACTIVE = "активный";
    const STATUS_NAME_DISACTIVE = "не активный";

    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'feedback';
    }

    public static function getStatus()
    {
        return [
          self::STATUS_DISABLED => self::STATUS_NAME_DISACTIVE,
          self::STATUS_ENABLED => self::STATUS_NAME_ACTIVE,
        ];

    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['message', 'fileName'], 'string'],
            [['status'], 'integer'],
            [['name', 'phone', 'email', 'site'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'phone' => 'Телефон',
            'email' => 'Email',
            'site' => 'Сайт',
            'message' => 'Сообщение',
            'status' => 'Статус',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFiles()
    {
        return $this->hasOne(Files::className(), ['feedback_id' => 'id']);
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        if ($this->fileName){
            Files::deleteAll(['feedback_id' => $this->id]);
            $files = new Files();
            $files->feedback_id = $this->id;
            $files->name = $this->fileName;
            $files->save();
        }

        if (Yii::$app->cache->flush()) {
            Yii::$app->session->setFlash('success', 'Кэш очищен');
        } else {
            Yii::$app->session->setFlash('error', 'Ошибка');
        }
        return false;
    }

    public function afterFind(){

        parent::afterFind();

        $this->fileName = $this->files ? $this->files->name : '';
    }
}
