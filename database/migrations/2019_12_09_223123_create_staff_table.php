<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('address');
            $table->string('phone_number');
            $table->string('city');
            $table->string('surburb');
            $table->string('sex');
            $table->string('title');
            $table->string('position');
            $table->string('email')->nullable();
            $table->unsignedBigInteger('class_id');
            $table->string('password');
            $table->foreign('class_id')->references('id')->on('class');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staff');
    }
}
