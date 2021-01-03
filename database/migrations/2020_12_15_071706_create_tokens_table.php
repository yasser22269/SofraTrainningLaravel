<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTokensTable extends Migration {

	public function up()
	{
		Schema::create('tokens', function(Blueprint $table) {
			$table->increments('id');
			$table->string('token');
			$table->enum('type', array('android', 'ios'));
			$table->morphs('accountable');
		});
	}

	public function down()
	{
		Schema::drop('tokens');
	}
}