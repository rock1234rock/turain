<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->bigIncrements('id');
           
            $table->double('price');
            $table->string('pic');

            $table->unsignedBigInteger('product_type');
            $table->unsignedBigInteger('grade');
            
            $table->timestamps();
            
            $table->foreign('product_type')->references('id')->on('product_type');
            $table->foreign('grade')->references('id')->on('grade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
