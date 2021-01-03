<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAddressesTable extends Migration {

	public function up()
	{
		Schema::create('addresses', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->integer('city_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('addresses');
	}
}