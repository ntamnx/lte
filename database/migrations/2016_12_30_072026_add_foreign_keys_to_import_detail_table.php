<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToImportDetailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('import_detail', function(Blueprint $table)
		{
			$table->foreign('import_id', 'FK_import_detail_imports')->references('id')->on('imports')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('product_id', 'FK_import_detail_products')->references('id')->on('products')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('import_detail', function(Blueprint $table)
		{
			$table->dropForeign('FK_import_detail_imports');
			$table->dropForeign('FK_import_detail_products');
		});
	}

}
