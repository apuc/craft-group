<?php

use yii\db\Migration;

/**
 * Handles adding position to table `blog_slider`.
 */
class m180524_124744_add_position_column_to_blog_slider_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('blog_slider', 'position', $this->integer()->unsigned());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('blog_slider', 'position');
    }
}
