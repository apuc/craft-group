<?php

use yii\db\Migration;

/**
 * Handles the creation of table `key_value`.
 */
class m180517_104539_create_key_value_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('key_value', [
            'id' => $this->primaryKey()->unsigned(),
            'key' => $this->string('255'),
            'value' => $this->text(),
	        'dt_add' => $this->integer('11'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('key_value');
    }
}
