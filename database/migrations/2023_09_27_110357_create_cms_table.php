<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms', function (Blueprint $table) {
            $table->bigIncrements('cms_id')->index();
            $table->string('screen_one_image',255)->nullable();
            $table->text('screen_one_content')->nullable();
            $table->string('screen_two_image',255)->nullable();
            $table->text('screen_two_content')->nullable();
            $table->string('screen_three_image',255)->nullable();
            $table->text('screen_three_content')->nullable();
            $table->string('bde_image',255)->nullable();
            $table->text('bde_question')->nullable();
            $table->text('bde_answer')->nullable();
            $table->string('franchise_image',255)->nullable();
            $table->text('franchise_question')->nullable();
            $table->text('franchise_answer')->nullable();
            $table->string('advertise_image',255)->nullable();
            $table->text('advertise_question')->nullable();
            $table->text('advertise_answer')->nullable();
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
        Schema::dropIfExists('cms');
    }
}
