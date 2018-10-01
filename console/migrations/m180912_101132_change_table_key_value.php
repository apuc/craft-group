<?php

use yii\db\Migration;

/**
 * Class m180912_101132_change_table_key_value
 */
class m180912_101132_change_table_key_value extends Migration
{
	/**
	 * {@inheritdoc}
	 */
	public function safeUp()
	{
		$this->addColumn('key_value', 'label', $this->string(255));
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown()
	{
		$this->dropColumn('key_value', 'label');
	}
}
