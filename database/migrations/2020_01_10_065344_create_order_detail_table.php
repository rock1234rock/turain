<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_detail', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('prod_id');
            $table->unsignedBigInteger('order_id')->nullable();
            $table->double('prod_price');
            $table->integer('amount');
            $table->unsignedBigInteger('sup_order_id')->nullable();
            
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('prod_id')->references('id')->on('product');
            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('sup_order_id')->references('id')->on('supplier_order');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_detail');
    }
}
