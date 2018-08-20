<?php

use yii\db\Migration;

/**
 * Handles adding position to table `service`.
 */
class m180524_130247_add_position_column_to_service_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('service', 'position', $this->integer()->unsigned());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('service', 'position');
    }
}
