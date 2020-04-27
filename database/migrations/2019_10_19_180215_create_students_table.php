<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('sex', 10);
            $table->string('disabilities');
            $table->string('address');
            $table->string('roles')->nullable();
            $table->string('curriculum_actives')->nullable();
            $table->string('email')->nullable();
            $table->date('dob');
            $table->string('student_number')->unique();
            $table->string('city');
            $table->string('surburb');
            $table->string('phone_number');
            $table->unsignedBigInteger('guardian_id');
            $table->foreign('guardian_id')->references('id')->on('guardians');
            $table->string('password');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
