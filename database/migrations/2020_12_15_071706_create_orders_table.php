<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdersTable extends Migration {

	public function up()
	{
		Schema::create('orders', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->decimal('price')->nullable();;
			$table->decimal('delivery_price')->default('0')->nullable();;
			$table->decimal('total_price')->nullable();;
			$table->decimal('net');
			$table->string('notes')->nullable();
			$table->string('Special_order')->nullable();
			$table->integer('payment_id')->unsigned();
			$table->integer('client_id')->unsigned();
			$table->integer('restaurant_id')->unsigned();
			$table->enum('state', array('pending', 'accepted', 'rejected', 'delivered','complete'));
			$table->decimal('commission')->nullable();;
		});
	}

	public function down()
	{
		Schema::drop('orders');
	}
}
