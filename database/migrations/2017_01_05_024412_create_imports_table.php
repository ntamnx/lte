<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateImportsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('imports', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('suppliers_id')->unsigned()->index('FK_imports_suppliers');
			$table->integer('user_id')->unsigned()->index('FK_imports_users');
			$table->float('total_money', 10, 0);
			$table->integer('status')->default(1);
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('imports');
	}

}
