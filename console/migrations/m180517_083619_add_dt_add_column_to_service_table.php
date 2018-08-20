<?php

use yii\db\Migration;

/**
 * Handles adding dt_add to table `service`.
 */
class m180517_083619_add_dt_add_column_to_service_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('service', 'dt_add', $this->integer(11)->defaultValue(NULL));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('service', 'dt_add');
    }
}
