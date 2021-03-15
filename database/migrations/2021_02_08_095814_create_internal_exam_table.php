<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInternalExamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedInteger('faculty')->nullable();
            $table->foreign('faculty')->references('id')->on('faculties')->onDelete('cascade');
            $table->unsignedInteger('level')->nullable();
            $table->foreign('level')->references('id')->on('levels')->onDelete('cascade'); 
            $table->unsignedInteger('programs')->nullable();           
            $table->foreign('programs')->references('id')->on('courses')->onDelete('cascade');
            $table->unsignedInteger('campus')->nullable();
            $table->foreign('campus')->references('id')->on('admins')->onDelete('cascade');
            $table->string('payment_method')->nullable();
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
            $table->string('nationality')->nullable();
            $table->string('dateOfBirth')->nullable();
            $table->string('district')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('father_name')->nullable();
            $table->string('ward')->nullable();
            $table->string('contact')->nullable();
            $table->string('email')->nullable();
            $table->string('board')->nullable();
            $table->string('passed_year')->nullable();
            $table->string('roll_no')->nullable();
            $table->string('division')->nullable();
            $table->string('image')->nullable();
            $table->string('signature')->nullable();
            $table->string('voucher')->nullable();
            $table->string('official_seal')->nullable();
            $table->string('authorized_signature')->nullable();
            $table->string('citizenship')->nullable();    
            $table->boolean('esewa_status')->default(0);
            $table->string('pid')->nullable();
            $table->string('rid')->nullable();
            $table->string('esewa_amt')->nullable();
            $table->string('scd')->nullable();
            $table->boolean('is_verified')->default(0);
            $table->boolean('is_final_verified')->default(0);
            $table->boolean('consent')->default(0);
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
        Schema::dropIfExists('exams');
    }
}
