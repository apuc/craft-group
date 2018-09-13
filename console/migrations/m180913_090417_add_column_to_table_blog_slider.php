<?php

use yii\db\Migration;

/**
 * Class m180913_090417_add_column_to_table_blog_slider
 */
class m180913_090417_add_column_to_table_blog_slider extends Migration
{
	/**
	 * {@inheritdoc}
	 */
	public function safeUp()
	{
        $this->addColumn('blog_slider', 'preview_text', $this->string(220));
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown()
	{
		$this->dropColumn('blog_slider', 'preview_text');
	}
}
