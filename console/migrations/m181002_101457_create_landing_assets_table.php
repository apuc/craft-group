<?php

use yii\db\Migration;

/**
 * Handles the creation of table `landing_assets`.
 */
class m181002_101457_create_landing_assets_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('landing_assets', [
            'id' => $this->primaryKey(),
            'lp_id' => $this->integer(),
            'type' => $this->integer(),
            'path'=>$this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('landing_assets');
    }
}
