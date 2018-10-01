<?php

use yii\db\Migration;

/**
 * Class m180823_102920_create_tabale_files
 */
class m180823_102920_create_tabale_files extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('files', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
            'order_id' => $this->integer()
        ]);

        $this->createIndex(
            'idx-files-order_id',
            'files',
            'order_id'
        );

        $this->addForeignKey(
            'fk-files-order_id',
            'files',
            'order_id',
            'order',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-files-order_id', 'files');
        $this->dropIndex('idx-files-order_id', 'files');
        $this->dropTable('files');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180823_102920_create_tabale_files cannot be reverted.\n";

        return false;
    }
    */
}
