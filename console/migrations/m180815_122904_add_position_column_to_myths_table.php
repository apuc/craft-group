<?php

use yii\db\Migration;

/**
 * Handles adding position to table `myths`.
 */
class m180815_122904_add_position_column_to_myths_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('myths', 'options', $this->tinyInteger(3)->unsigned());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('myths', 'options');
    }
}
