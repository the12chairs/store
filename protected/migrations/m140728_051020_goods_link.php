<?php

class m140728_051020_goods_link extends CDbMigration
{
	public function up()
	{
        $this->createTable('goods_link', array(
            'id_good' => 'integer NOT NULL',
            'id_cat' => 'integer NOT NULL',
        ));
        $this->addForeignKey('fk_good', 'goods_link', 'id_good', 'goods', 'id');
        $this->addForeignKey('fk_cat', 'goods_link', 'id_cat', 'categories', 'id');


    }

	public function down()
	{
        $this->delete("goods_link");
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