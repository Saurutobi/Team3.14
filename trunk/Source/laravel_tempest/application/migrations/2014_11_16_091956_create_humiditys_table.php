<?php

class Create_Humiditys_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('humiditys', function($table){
			$table->engine = 'InnoDB';
			$table->increments('id');
			$table->float('humidity');
			$table->timestamp('time');
			$table->integer('port')->unsigned();

			$table->integer('device_id')->unsigned();
			$table->foreign('device_id')->references('id')->on('devices')->on_update('cascade')->on_delete('cascade');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('humiditys');
	}

}