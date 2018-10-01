<?php

use yii\db\Migration;

/**
 * Class m180910_142302_add_column_to_myths_table
 */
class m180910_142302_add_column_to_myths_table extends Migration
{
	/**
	 * {@inheritdoc}
	 */
	public function safeUp()
	{
		$this->addColumn('myths', 'content', $this->text());
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown()
	{
		$this->dropColumn('myths', 'content');
	}

	/*
	// Use up()/down() to run migration code without a transaction.
	public function up()
	{

	}

	public function down()
	{
		echo "m180910_142302_add_column_to_myths_table cannot be reverted.\n";

		return false;
	}
	*/
}
