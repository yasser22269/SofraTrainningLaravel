<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrderProductTable extends Migration {

	public function up()
	{
		Schema::create('order_product', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('order_id')->unsigned();
			$table->integer('product_id')->unsigned();
			$table->text('note')->nullable();
			$table->integer('price')->nullable();
			$table->integer('quantity')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('order_product');
	}
}
