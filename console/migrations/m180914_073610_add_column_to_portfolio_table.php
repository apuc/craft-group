<?php

use yii\db\Migration;

/**
 * Class m180914_073610_add_column_to_portfolio_table
 */
class m180914_073610_add_column_to_portfolio_table extends Migration
{
	/**
	 * {@inheritdoc}
	 */
	public function safeUp()
	{
		$this->addColumn('portfolio', 'compressing_image', $this->integer());
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown()
	{
		$this->dropColumn('portfolio', 'compressing_image');
	}
}
