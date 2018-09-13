<?php

use yii\db\Migration;

/**
 * Class m180913_133214_add_column_to_blog_slider
 */
class m180913_133214_add_column_to_blog_slider extends Migration
{
	/**
	 * {@inheritdoc}
	 */
	public function safeUp()
	{
		$this->addColumn('blog_slider', 'compressing_image', $this->integer());
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown()
	{
		$this->dropColumn('blog_slider', 'compressing_image');
	}
}
