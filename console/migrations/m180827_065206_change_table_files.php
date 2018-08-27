<?php

use yii\db\Migration;

/**
 * Class m180827_065206_change_table_files
 */
class m180827_065206_change_table_files extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('files', 'vacancy_order_id', $this->integer(11));

        $this->createIndex(
            'idx-files-vacancy_order_id',
            'files',
            'vacancy_order_id'
        );

        $this->addForeignKey(
            'fk-files-vacancy_order_id',
            'files',
            'vacancy_order_id',
            'vacancy_order',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-files-vacancy_order_id', 'files');
        $this->dropIndex('idx-files-vacancy_order_id', 'files');
        $this->dropColumn('files', 'vacancy_order_id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180827_065206_change_table_files cannot be reverted.\n";

        return false;
    }
    */
}
