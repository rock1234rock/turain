<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupplierOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier_order', function (Blueprint $table) {
            
            $table->bigIncrements('id');

            $table->date('sup_order_date');
            $table->double('sup_order_total');
            $table->double('sup_price');
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('prod_id');
            $table->unsignedBigInteger('sup_id');
           
           
           $table->timestamps();
           $table->foreign('order_id')->references('id')->on('orders');
           $table->foreign('user_id')->references('id')->on('users');
           $table->foreign('prod_id')->references('id')->on('product');
           $table->foreign('sup_id')->references('id')->on('supplier');
           
           
           


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supplier_order');
    }
}
