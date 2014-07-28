<?php

class m140728_045515_create_table_goods extends CDbMigration
{
	public function up()
	{
        $this->createTable('goods', array(
            'id' => 'pk',
            'name' => 'string NOT NULL',
            'cost' => 'integer NOT NULL',
        ));
        //$this->addForeignKey('fk_category', 'goods', 'id_category', 'categories', 'id');

	}

	public function down()
	{
        $this->delete("goods");
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