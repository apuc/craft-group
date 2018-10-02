<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "langing_pages".
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $content
 * @property string $dt_add
 * @property string $dt_update
 * @property int $status
 */
class LangingPage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'langing_pages';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content'],'required'],
            [['status'], 'integer'],
            [['title'], 'required'],
            [['title', 'slug', 'dt_add', 'dt_update'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'slug' => 'Slug',
            'content' => 'Контент',
            'dt_add' => 'Дата добавления',
            'dt_update' => 'Дата обновления',
            'status' => 'Статус',
        ];
    }
}
