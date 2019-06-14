<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassroomsTable extends Migration
{

    public function up()
    {
        Schema::create('classrooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer( 'level');
            $table->integer('seats_number');
            $table->integer('room_num');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('classrooms');
    }
}
