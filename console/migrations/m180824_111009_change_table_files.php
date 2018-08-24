<?php

use yii\db\Migration;

/**
 * Class m180824_111009_change_table_files
 */
class m180824_111009_change_table_files extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('files', 'feedback_id', $this->integer(11));

        $this->createIndex(
            'idx-files-feedback_id',
            'files',
            'feedback_id'
        );

        $this->addForeignKey(
            'fk-files-feedback_id',
            'files',
            'feedback_id',
            'feedback',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-files-feedback_id', 'files');
        $this->dropIndex('idx-files-feedback_id', 'files');
        $this->dropColumn('files', 'feedback_id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180824_111009_change_table_files cannot be reverted.\n";

        return false;
    }
    */
}
