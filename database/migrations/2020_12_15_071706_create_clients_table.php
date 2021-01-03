<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientsTable extends Migration {

	public function up()
	{
		Schema::create('clients', function(Blueprint $table) {
			$table->increments('id', true);
			$table->string('name');
			$table->string('email');
			$table->string('phone');
			$table->string('password');
			$table->string('Photo')->nullable();
			$table->integer('address_id')->unsigned();
			$table->string('api_token', 60)->unique()->nullable();
			$table->string('code_remember')->nullable();
			$table->timestamps();
			$table->string('active_Admin')->default('0');
		});
	}

	public function down()
	{
		Schema::drop('clients');
	}
}