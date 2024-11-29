<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ad_packages', function (Blueprint $table) {
            $table->bigIncrements('adp_id')->index();
            $table->string('package_name')->nullable();
            $table->string('package_duration')->nullable();
            $table->string('ad_seconds')->nullable();
            $table->string('level_type')->nullable();
            $table->string('ad_type')->nullable();
            $table->double('country_price')->nullable();
            $table->double('state_price')->nullable();
            $table->double('district_price')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
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
        Schema::dropIfExists('ad_packages');
    }
}
