<?php

use yii\db\Migration;

/**
 * Class m180920_133638_create_table_tags_opengraph
 */
class m180920_133638_create_table_tags_opengraph extends Migration
{
	/**
	 * {@inheritdoc}
	 */
	public function safeUp()
	{
		$this->createTable('tags_opengraph', [
			'id' => $this->primaryKey(),
			'key' => $this->string(255),
			'page' => $this->string(255),
			'title' => $this->string(255),
			'description' => $this->string(255),
			'image' => $this->string(255),
			'created_at' => $this->integer(11),
			'updated_at' => $this->integer(11)
		]);
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown()
	{
		$this->dropTable('tags_opengraph');
	}
}
