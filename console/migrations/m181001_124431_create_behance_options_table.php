<?php

use yii\db\Migration;

/**
 * Handles the creation of table `behance_options`.
 */
class m181001_124431_create_behance_options_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('behance_options', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'value' => $this->string(),
        ]);

        $this->insert('behance_options', [
            'name' => 'max_likes',
            'value' => '3',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('behance_options');
    }
}
