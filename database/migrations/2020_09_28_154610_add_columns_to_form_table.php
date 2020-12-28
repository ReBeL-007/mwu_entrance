<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToFormTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('forms', function (Blueprint $table) {
            //
            $table->string('exam_centre')->nullable();
            $table->string('vdc')->nullable();
            $table->string('dateOfBirth')->nullable();
            $table->string('district')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('mother_qualification')->nullable();
            $table->string('mother_occupation')->nullable();
            $table->string('father_name')->nullable();
            $table->string('father_qualification')->nullable();
            $table->string('father_occupation')->nullable();
            $table->string('spouse_name')->nullable();
            $table->string('spouse_qualification')->nullable();
            $table->string('spouse_occupation')->nullable();
            $table->string('ward')->nullable();
            $table->string('contact')->nullable();
            $table->string('contact_address')->nullable();
            $table->string('email')->nullable();
            $table->string('board')->nullable();
            $table->string('passed_year')->nullable();
            $table->string('roll_no')->nullable();
            $table->string('division')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('forms', function (Blueprint $table) {
            //
        });
    }
}
