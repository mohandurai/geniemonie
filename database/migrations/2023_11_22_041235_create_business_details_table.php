<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_details', function (Blueprint $table) {
            $table->bigIncrements('business_id');
            $table->unsignedBigInteger('user_id')->index()->nullable();
            $table->string('company_name',150)->nullable();
            $table->string('company_email',255)->nullable();
            $table->text('address')->nullable();
            $table->unsignedBigInteger('state_id')->index()->nullable();
            $table->unsignedBigInteger('district_id')->index()->nullable();
            $table->unsignedBigInteger('city_id')->index()->nullable();
            $table->string('pincode',150)->nullable();
            $table->string('contact_number',150)->nullable();
            $table->string('contact_person_name',150)->nullable();
            $table->string('category',150)->nullable();
            $table->string('gst',150)->nullable();
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
        Schema::dropIfExists('business_details');
    }
}
