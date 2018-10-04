<?php

use yii\db\Migration;

/**
 * Handles adding preview to table `behance_works`.
 */
class m181004_114519_add_preview_column_to_behance_works_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('behance_works', 'preview', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('behance_works', 'preview');
    }
}
