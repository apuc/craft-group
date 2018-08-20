<?php

use yii\db\Migration;

/**
 * Handles adding position to table `menu`.
 */
class m180801_093311_add_position_column_to_menu_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('menu', 'position', $this->integer()->unsigned());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('menu', 'position');
    }
}
