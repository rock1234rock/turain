<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->uniqued();
            $table->enum('preface', array('นาย','นาง','นางสาว'));
            $table->string('fristname');
            $table->string('lastname');
            $table->string('address');
            $table->string('province');
            $table->string('zipcode');
            $table->string('phone');
            $table->timestamps();
            

            $table->foreign('id')->references('id')->on('users');
            $table->primary('id');	
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
