<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->enum('user_type',['Admin','StateManager','CustomerCare','ContentWriter','User','Player','bde','franchise','Advertiser','Editor','Telecaller'])->nullable();
            $table->unsignedBigInteger('state_id')->nullable();
            $table->unsignedBigInteger('district_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->string('pincode',150)->nullable();;
            $table->string('code',150)->nullable();;
            $table->string('referral_id', 150)->nullable();
            $table->string('profile_image')->nullable();
            $table->string('name',150)->nullable();
            $table->string('email',255)->nullable();
            $table->string('contact_email',255)->nullable();
            $table->string('phone_no')->nullable();
            $table->string('category')->nullable();
            $table->string('gst_no')->nullable();
            $table->string('company_name',255)->nullable();
            $table->string('contact_person_name',255)->nullable();;
            $table->enum('marital_status',['Married','Unmarried']);
            $table->enum('gender',['M','F']);
            $table->enum('approved_status',['Y','N','P']);
            $table->string('father_name',150)->nullable();;
            $table->string('website',255)->nullable();;
            $table->string('industry',255)->nullable();;
            $table->integer('otp')->nullable();
            $table->integer('status')->default(0);
            $table->tinyInteger('otp_verify')->default(0);
            $table->text('location')->nullable();
            $table->unsignedBigInteger('working_status_id')->nullable();
            $table->string('id_proof', 255)->nullable();
            $table->string('address_proof', 255)->nullable();
            $table->text('address')->nullable();
            $table->text('address_1')->nullable();
            $table->string('city',150)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password',255);
            $table->string('allocated_area',255)->nullable();;
            $table->date('created_date')->nullable();;
            $table->date('date_of_join')->nullable();
            $table->date('verified_date')->nullable();
            $table->string('education',255)->nullable();;
            $table->string('experience',255)->nullable();;
            $table->integer('created_by');
            $table->integer('fr_id');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
