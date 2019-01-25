<?php

use yii\db\Migration;

/**
 * Class m181004_112416_add_coumns_to_behance_works_table
 */
class m181004_112416_add_coumns_to_behance_works_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
     $this->addColumn("behance_works","behance_id",$this->string());
     $this->addColumn("behance_works","name",$this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn("behance_works","behance_id");
        $this->dropColumn("behance_works","name");

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181004_112416_add_coumns_to_behance_works_table cannot be reverted.\n";

        return false;
    }
    */
}
