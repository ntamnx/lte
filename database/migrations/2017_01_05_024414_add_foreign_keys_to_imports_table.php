<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToImportsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('imports', function(Blueprint $table)
		{
			$table->foreign('suppliers_id', 'FK_imports_suppliers')->references('id')->on('supplies')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('user_id', 'FK_imports_users')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('imports', function(Blueprint $table)
		{
			$table->dropForeign('FK_imports_suppliers');
			$table->dropForeign('FK_imports_users');
		});
	}

}
