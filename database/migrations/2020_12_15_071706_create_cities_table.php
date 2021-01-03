<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCitiesTable extends Migration {

	public function up()
	{
		Schema::create('cities', function(Blueprint $table) {
			$table->increments('id', true);
			$table->string('name');
		});
	}

	public function down()
	{
		Schema::drop('cities');
	}
}