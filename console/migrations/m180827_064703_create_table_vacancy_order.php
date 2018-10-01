<?php

use yii\db\Migration;

/**
 * Class m180827_064703_create_table_vacancy_order
 */
class m180827_064703_create_table_vacancy_order extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('vacancy_order', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
            'phone' => $this->string(255),
            'email' => $this->string(255),
            'skype' => $this->string(255),
            'message' => $this->text()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('vacancy_order');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180827_064703_create_table_vacancy_order cannot be reverted.\n";

        return false;
    }
    */
}
