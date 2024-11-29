<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnquiresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enquires', function (Blueprint $table) {
            $table->bigIncrements('enquire_id')->index();
            $table->unsignedBigInteger('user_id')->index()->nullable();
            $table->unsignedBigInteger('state_id')->index()->nullable();
            $table->unsignedBigInteger('city_id')->index()->nullable();
            $table->unsignedBigInteger('district_id')->index()->nullable();
            $table->unsignedBigInteger('pincode')->index()->nullable();
            $table->string('company_name',150)->nullable();
            $table->string('co_per_name',150)->nullable();
            $table->string('category',150)->nullable();
            $table->string('gst',20)->nullable();
            $table->string('ph_number',15)->nullable();
            $table->string('email',255)->nullable();
            $table->string('website',150)->nullable();
            $table->string('industry',150)->nullable();
            $table->text('address_1')->nullable();
            $table->text('address_2')->nullable();
            $table->enum('status', ['0', '1'])->default('1');
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
        Schema::dropIfExists('enquires');
    }
}
