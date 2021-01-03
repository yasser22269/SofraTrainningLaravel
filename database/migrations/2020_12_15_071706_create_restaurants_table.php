<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRestaurantsTable extends Migration {

	public function up()
	{
		Schema::create('restaurants', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->string('email');
			$table->string('phone');
			$table->string('password');
			$table->string('photo')->nullable();
			$table->integer('address_id')->unsigned();
			$table->decimal('delivery_cost');
			$table->integer('delivery_number');
			$table->decimal('min_order');
			$table->integer('category_id')->unsigned();
			$table->string('api_token', 60)->unique()->nullable();
			$table->string('pin_code')->nullable();
			$table->integer('is_activate')->default('1');
			$table->string('whats_app');
			$table->enum('state', array('open', 'close'));
		});
	}

	public function down()
	{
		Schema::drop('restaurants');
	}
}