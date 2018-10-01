<?php

use yii\db\Migration;

/**
 * Handles the creation of table `call_back`.
 */
class m180906_092809_create_call_back_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('call_back', [
	        'id' => $this->primaryKey()->unsigned(),
	        'phone' => $this->string(),
	        'dt_add' => $this->integer('11'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('call_back');
    }
}
