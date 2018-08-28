<?php

use yii\db\Migration;

/**
 * Handles adding position to table `vacancy`.
 */
class m180828_072956_add_position_column_to_vacancy_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('vacancy', 'img', $this->text());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('vacancy', 'img');
    }
}
