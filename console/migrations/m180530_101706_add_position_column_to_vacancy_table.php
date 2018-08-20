<?php

use yii\db\Migration;

/**
 * Handles adding position to table `vacancy`.
 */
class m180530_101706_add_position_column_to_vacancy_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('vacancy', 'demands', $this->text());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('vacancy', 'demands');
    }
}
