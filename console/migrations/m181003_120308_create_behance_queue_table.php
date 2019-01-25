<?php

use yii\db\Migration;

/**
 * Handles the creation of table `behance_queue`.
 */
class m181003_120308_create_behance_queue_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('behance_queue', [
            'id' => $this->primaryKey(),
            'work_id' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('behance_queue');
    }
}
