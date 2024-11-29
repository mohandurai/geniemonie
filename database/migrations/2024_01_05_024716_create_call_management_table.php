<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCallManagementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('call_management', function (Blueprint $table) {
            $table->bigIncrements('call_management_id')->index();
            $table->string('name')->nullable();
            $table->string('company_name')->nullable();
            $table->string('phone_no')->nullable();
            $table->string('email')->nullable();
            $table->enum('status',['NotAttended','Rejected','FollowUp','Won'])->nullable();
            $table->text('notes')->nullable();
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
        Schema::dropIfExists('call_management');
    }
}
