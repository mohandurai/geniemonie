<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStateManagerCommisionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('state_manager_commision', function (Blueprint $table) {
            $table->bigIncrements('smc_id')->index();
            $table->string('direct_ad')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('fran_paid_ad')->nullable();
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
        Schema::dropIfExists('state_manager_commision');
    }
}
