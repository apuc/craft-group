<?php

use yii\db\Migration;

/**
 * Handles the creation of table `behance_accounts`.
 */
class m180928_141355_create_behance_accounts_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('behance_accounts', [
            'id' => $this->primaryKey(),
            'url' => $this->string(),
            'title' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('behance_accounts');
    }
}
