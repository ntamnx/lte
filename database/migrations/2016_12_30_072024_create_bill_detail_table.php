<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBillDetailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bill_detail', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('bill_id')->unsigned()->index('FK_bill_detail_bill');
			$table->integer('product_id')->unsigned()->index('FK_bill_detail_products');
			$table->integer('price')->unsigned();
			$table->integer('quanlity')->unsigned();
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
		Schema::drop('bill_detail');
	}

}
