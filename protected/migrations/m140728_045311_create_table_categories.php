<?php

class m140728_045311_create_table_categories extends CDbMigration
{
	public function up()
	{
        $this->createTable('categories', array(
            'id' => 'pk',
            'category' => 'string NOT NULL',
        ));
	}

	public function down()
	{
        $this->delete("categories");
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}