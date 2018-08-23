<?php

use yii\db\Migration;

/**
 * Class m180823_102529_create_tabale_order_service
 */
class m180823_102529_create_tabale_order_service extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('order_service_list', [
            'order_id' => $this->integer(),
            'service_list_id' => $this->integer()
        ]);

        $this->createIndex(
            'idx-order_service_list-order_id',
            'order_service_list',
            'order_id'
        );

        $this->addForeignKey(
            'fk-order_service_list-order_id',
            'order_service_list',
            'order_id',
            'order',
            'id'
        );
        
        $this->createIndex(
            'idx-order_service_list-service_list_id',
            'order_service_list',
            'service_list_id'
        );
        
        $this->addForeignKey(
            'fk-order_service_list-service_list_id',
            'order_service_list',
            'service_list_id',
            'service_list',
            'id'
        );
        
        


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-order_service_list-service_list_id', 'order_service_list');
        
        $this->dropIndex('idx-order_service_list-service_list_id', 'order_service_list');
        
        $this->dropForeignKey('fk-order_service_list-order_id', 'order_service_list');

        $this->dropIndex('idx-order_service_list-order_id', 'order_service_list');

        $this->dropTable('order_service_list');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180823_102529_create_tabale_order_service cannot be reverted.\n";

        return false;
    }
    */
}
