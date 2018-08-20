<?php

use yii\db\Migration;

/**
 * Handles the creation of table `menu`.
 */
class m180801_085930_create_menu_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('menu', [
            'id' => $this->primaryKey()->unsigned(),
            'title' => $this->string(255)->notNull()->unique(),
            'href' => $this->text(),
            'dt_add' =>$this->integer(11)->defaultValue(NULL)->unsigned(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('menu');
    }
}
