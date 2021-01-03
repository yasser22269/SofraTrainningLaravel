<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration {

	public function up()
	{
		Schema::create('products', function(Blueprint $table) {
			$table->increments('id');
			$table->string('Photo')->nullable();
			$table->string('title');
			$table->text('content');
			$table->decimal('price');
			$table->decimal('price_offer')->nullable();
			$table->integer('restaurant_id')->unsigned();
			$table->string('Processing_time')->nullable()->default('20');
		});
	}

	public function down()
	{
		Schema::drop('products');
	}
}