<?php

use yii\db\Migration;

/**
 * Handles the creation of table `lp_options`.
 */
class m181002_075840_create_lp_options_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('lp_options', [
            'id' => $this->primaryKey(),
            'lp_id' => $this->integer(),
            'metka' => $this->string(),
            'key' => $this->string(),
            'value' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('lp_options');
    }
}
