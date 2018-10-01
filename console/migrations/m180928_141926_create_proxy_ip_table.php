<?php

use yii\db\Migration;

/**
 * Handles the creation of table `proxy_ip`.
 */
class m180928_141926_create_proxy_ip_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('proxy_ip', [
            'id' => $this->primaryKey(),
            'ip' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('proxy_ip');
    }
}
