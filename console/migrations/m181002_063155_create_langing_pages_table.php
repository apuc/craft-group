<?php

use yii\db\Migration;

/**
 * Handles the creation of table `langing_pages`.
 */
class m181002_063155_create_langing_pages_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('langing_pages', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'slug' => $this->string(),
            'content' => $this->text(),
            'dt_add' => $this->string(),
            'dt_update' => $this->string(),
            'status' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('langing_pages');
    }
}
