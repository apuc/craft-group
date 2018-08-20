<?php

use yii\db\Migration;

/**
 * Handles the creation of table `main`.
 */
class m180523_132901_create_main_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('main', [
	        'id' => $this->primaryKey()->unsigned(),
	        'name' => $this->string('255'),
	        'description' => $this->text(),
	        'file' => $this->string('255'),
	        'dt_add' => $this->integer('11'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('main');
    }
}
