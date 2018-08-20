<?php

use yii\db\Migration;

/**
 * Handles dropping position from table `menu`.
 */
class m180816_115219_drop_position_column_from_menu_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('menu', 'title');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('menu', 'title', $this->string());
    }
}
