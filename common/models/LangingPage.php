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

//Status 0 - не выводить
//Status 1 - выводить

class LangingPage extends \yii\db\ActiveRecord
{

    public function behaviors() {
        return [
            'slug' => [
                'class'         => 'common\behaviors\Slug',
                'in_attribute'  => 'title',
                'out_attribute' => 'slug',
                'translit'      => true
            ],
        ];
    }

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
