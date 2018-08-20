<?php

use yii\db\Migration;

/**
 * Handles adding position to table `vacancy`.
 */
class m180530_101635_add_position_column_to_vacancy_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('vacancy', 'conditions', $this->text());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('vacancy', 'conditions');
    }
}
