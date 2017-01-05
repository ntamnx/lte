<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateImportDetailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('import_detail', function(Blueprint $table)
		{
			$table->integer('id')->unsigned()->primary();
			$table->integer('product_id')->unsigned()->index('FK_import_detail_products');
			$table->integer('quantity')->unsigned();
			$table->integer('price')->unsigned();
			$table->integer('import_id')->unsigned()->index('FK_import_detail_imports');
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
		Schema::drop('import_detail');
	}

}
