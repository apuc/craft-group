<?php

use yii\db\Migration;

/**
 * Handles adding position to table `service`.
 */
class m180828_074044_add_position_column_to_service_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('service', 'img', $this->text());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('service', 'img');
    }
}
