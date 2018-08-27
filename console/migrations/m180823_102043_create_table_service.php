<?php

use yii\db\Migration;

/**
 * Class m180823_102043_create_table_service
 */
class m180823_102043_create_table_service extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('service_list', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('service_list');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180823_102043_create_table_service cannot be reverted.\n";

        return false;
    }
    */
}
