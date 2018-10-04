<?php

use yii\db\Migration;

/**
 * Handles adding likes_count to table `behance_queue`.
 */
class m181004_073432_add_likes_count_column_to_behance_queue_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('behance_queue', 'likes_count', $this->integer());

        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }
}
