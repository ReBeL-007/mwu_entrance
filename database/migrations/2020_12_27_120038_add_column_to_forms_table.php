<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToFormsTable extends Migration
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
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); 
            // $table->text('major_subjects');  
            $table->string('see_certificate')->nullable();
            $table->string('see_marksheet')->nullable();
            $table->string('see_provisional')->nullable();         
            $table->string('intermediate_certificate')->nullable();
            $table->string('intermediate_marksheet')->nullable();
            $table->string('intermediate_provisional')->nullable();         
            $table->string('bachelor_certificate')->nullable();
            $table->string('bachelor_marksheet')->nullable();
            $table->string('bachelor_provisional')->nullable();         
            $table->string('masters_certificate')->nullable();
            $table->string('masters_marksheet')->nullable();
            $table->string('masters_provisional')->nullable();         
            $table->string('official_seal')->nullable();
            $table->string('authorized_signature')->nullable();
            $table->boolean('esewa_status')->default(0);
            $table->string('citizenship')->nullable();         
            $table->string('community_certificate')->nullable();
            $table->string('sponsor_letter')->nullable();
            $table->string('pid')->nullable();
            $table->string('rid')->nullable();
            $table->string('esewa_amt')->nullable();
            $table->string('scd')->nullable();
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
