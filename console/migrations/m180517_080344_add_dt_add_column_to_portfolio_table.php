<?php

use yii\db\Migration;

/**
 * Handles adding dt_add to table `portfolio`.
 */
class m180517_080344_add_dt_add_column_to_portfolio_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('portfolio', 'dt_add', $this->integer(11)->defaultValue(NULL));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('portfolio', 'dt_add');
    }
}
