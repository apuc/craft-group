<?php

use yii\db\Migration;

/**
 * Handles the creation of table `myths`.
 */
class m180815_105105_create_myths_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('myths', [
	        'id' => $this->primaryKey()->unsigned(),
	        'title' => $this->string('255'),
	        'h1' => $this->string('255'),
	        'meta_key' => $this->string('255'),
	        'meta_desc' => $this->string('255'),
	        'description' => $this->text(),
	        'file' => $this->string('255'),
	        'slug' => $this->string('255'),
	        'dt_add' => $this->integer('11')->unsigned(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('myths');
    }
}
