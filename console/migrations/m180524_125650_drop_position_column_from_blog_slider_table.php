<?php

use yii\db\Migration;

/**
 * Handles dropping position from table `blog_slider`.
 */
class m180524_125650_drop_position_column_from_blog_slider_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('blog_slider', 'position');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('blog_slider', 'position', $this->integer());
    }
}
