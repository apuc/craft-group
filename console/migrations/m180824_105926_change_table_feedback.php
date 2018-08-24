<?php

use yii\db\Migration;

/**
 * Class m180824_105926_change_table_feedback
 */
class m180824_105926_change_table_feedback extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropTable('feedback');
        $this->createTable('feedback', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
            'phone' => $this->string(255),
            'email' => $this->string(255),
            'site' => $this->string(255),
            'message' => $this->text()
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('feedback');
        $this->createTable('feedback', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255),
            'meta_key' => $this->string(255),
            'meta_description' => $this->string(255),
            'description' => $this->text(),
            'file' => $this->text(),
            'href' => $this->text(),
            'city' => $this->string(255),
            'email' => $this->string(255),
            'name' => $this->string(255),
            'site' => $this->string(255),
            'category' => $this->string(255),
            'status' => $this->integer(11),
            'date' => $this->dateTime()
        ]);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180824_105926_change_table_feedback cannot be reverted.\n";

        return false;
    }
    */
}
