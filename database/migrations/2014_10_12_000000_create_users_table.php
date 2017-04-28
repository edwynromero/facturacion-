<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('ruc');
            $table->string('address');
            $table->timestamps();
        });
	
	   Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->decimal('price',10,2);
            $table->timestamps();
        });
		Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id')->unsigned();
            $table->decimal('iva',10,2);
            $table->decimal('subTotal',10,2);
            $table->decimal('total',10,2);
            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('clients');

        });
	     Schema::create('invoice_items', function (Blueprint $table) {
	     	$table->increments('id');
            $table->integer('invoice_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->decimal('quantity',10,2);
			$table->decimal('unitPrice',10,2);
			$table->decimal('total',10,2);
            $table->timestamps();

            $table->foreign('invoice_id')->references('id')->on('invoices');
            $table->foreign('product_id')->references('id')->on('products');
        });
		
		 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
     
    }
}
