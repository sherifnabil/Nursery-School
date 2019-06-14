<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::disableForeignKeyConstraints();

        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('second_name');
            $table->string( 'third_name');
            $table->string('address');
            $table->string( 'guardian');
            $table->string('phone');
            $table->string('status')->default('pending');
            $table->string('accept_note')->nullable();
            $table->string( 'photo');
            $table->text( 'other_files')->nullable();
            $table->enum('gender', ['boy', 'girl']);

            $table->enum('graduated', ['graduated', 'ungraduated'])->default('ungraduated');
            $table->boolean('left')->default(0);
            $table->string('left_reason')->nullable();

            
            $table->unsignedBigInteger('classroom_id')->nullable();
            $table->foreign('classroom_id')->references('id')->on('classrooms');

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
        Schema::dropIfExists('students');
    }
}
