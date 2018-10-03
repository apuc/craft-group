<?php

namespace frontend\modules\landing\models;

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
            [['content'], 'string'],
            [['status'], 'integer'],
            [['title', 'slug', 'dt_add', 'dt_update'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'slug' => 'Slug',
            'content' => 'Content',
            'dt_add' => 'Dt Add',
            'dt_update' => 'Dt Update',
            'status' => 'Status',
        ];
    }
}
