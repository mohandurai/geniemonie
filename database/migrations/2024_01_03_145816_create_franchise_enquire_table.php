<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFranchiseEnquireTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('franchise_enquire', function (Blueprint $table) {
            $table->bigIncrements('franchise_enquire_id')->index();
            $table->string('company_name')->nullable();
            $table->string('contact_person_name')->nullable();
            $table->string('category')->nullable();
            $table->string('gst_no')->nullable();
            $table->string('company_email')->nullable();
            $table->string('contact_no')->nullable();
            $table->text('address')->nullable();
            $table->unsignedBigInteger('state_id')->default(0);
            $table->unsignedBigInteger('city_id')->default(0);
            $table->unsignedBigInteger('pincode_id')->default(0);
            $table->string('pin_code')->nullable();
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
        Schema::dropIfExists('franchise_enquire');
    }
}
