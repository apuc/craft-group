<?php

use yii\db\Migration;

/**
 * Handles adding position to table `menu`.
 */
class m180816_115302_add_position_column_to_menu_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('menu', 'title', $this->string(255));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('menu', 'title');
    }
}
