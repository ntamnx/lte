<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToBillDetailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('bill_detail', function(Blueprint $table)
		{
			$table->foreign('bill_id', 'FK_bill_detail_bill')->references('id')->on('bills')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('product_id', 'FK_bill_detail_products')->references('id')->on('products')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('bill_detail', function(Blueprint $table)
		{
			$table->dropForeign('FK_bill_detail_bill');
			$table->dropForeign('FK_bill_detail_products');
		});
	}

}
