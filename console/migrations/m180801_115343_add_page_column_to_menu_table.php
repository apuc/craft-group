<?php

use yii\db\Migration;

/**
 * Handles adding page to table `menu`.
 */
class m180801_115343_add_page_column_to_menu_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
	    $this->addColumn('menu', 'page', $this->string(255)->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('menu', 'page');
    }
}
