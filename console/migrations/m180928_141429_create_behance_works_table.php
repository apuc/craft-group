<?php

use yii\db\Migration;

/**
 * Handles the creation of table `behance_works`.
 */
class m180928_141429_create_behance_works_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('behance_works', [
            'id' => $this->primaryKey(),
            'account_id' => $this->integer(),
            'url' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('behance_works');
    }
}
