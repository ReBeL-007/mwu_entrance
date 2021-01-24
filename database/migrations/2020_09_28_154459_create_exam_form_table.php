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
            $table->string('symbol_no')->nullable();
            $table->unsignedInteger('faculty')->nullable();
            $table->foreign('faculty')->references('id')->on('faculties')->onDelete('cascade');
            $table->unsignedInteger('level')->nullable();
            $table->foreign('level')->references('id')->on('levels')->onDelete('cascade');            
            $table->unsignedInteger('campus')->nullable();
            $table->foreign('campus')->references('id')->on('admins')->onDelete('cascade');
            $table->string('year')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('sex')->nullable();
            $table->string('fname')->nullable();
            $table->string('mname')->nullable();
            $table->string('lname')->nullable();
            $table->string('caste')->nullable();
            $table->string('religion')->nullable();
            $table->string('nationality')->nullable();
            $table->string('dateOfBirth2')->nullable();
            $table->string('tole')->nullable();
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
