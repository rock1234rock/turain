<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->double('total');
           
            $table->unsignedBigInteger('user_id');
           
            $table->double('total_price');
            $table->string('receipt');
            $table->string('status');
            $table->date('receiv');
            $table->date('send')->nullable();
            $table->string('tag')->nullable();
            $table->string('delivery')->nullable();
            $table->string('add2')->nullable();
            $table->string('city')->nullable();
            $table->string('zip')->nullable();
            $table->timestamps();
           
            $table->foreign('user_id')->references('id')->on('users');
           
           
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order');
    }
}
