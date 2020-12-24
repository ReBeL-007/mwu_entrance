<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamFormTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forms', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('faculty')->nullable();
            $table->foreign('faculty')->references('id')->on('faculties')->onDelete('cascade');
            $table->unsignedInteger('level')->nullable();
            $table->foreign('level')->references('id')->on('levels')->onDelete('cascade');            
            $table->string('campus')->nullable();
            $table->string('year')->nullable();
            $table->string('form_serial_no')->nullable();
            $table->string('sex')->nullable();
            $table->string('fname')->nullable();
            $table->string('mname')->nullable();
            $table->string('lname')->nullable();
            $table->string('regd_no')->nullable();
            $table->string('symbol_no')->nullable();
            $table->string('semester')->nullable();
            $table->string('exam_type')->nullable();
            $table->string('subjects')->nullable();
            $table->string('subject_codes')->nullable();
            $table->string('image')->nullable();
            $table->string('signature')->nullable();
            $table->boolean('is_verified')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forms');
    }
}
