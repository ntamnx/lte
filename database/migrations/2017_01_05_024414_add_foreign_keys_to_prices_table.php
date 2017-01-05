<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPricesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('prices', function(Blueprint $table)
		{
			$table->foreign('product_id', 'FK_prices_products')->references('id')->on('products')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('prices', function(Blueprint $table)
		{
			$table->dropForeign('FK_prices_products');
		});
	}

}
