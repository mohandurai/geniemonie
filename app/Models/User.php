<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'approved_status',
        'pincode',
        'fr_id',
        'user_id',
        'role_id',
        'report_to_role_id',
        'status',
        'father_name',
        'gender',
        'marital_status',
        'experience',
        'education',
        'fr_code',
        'website',
        'industry',
        'allocated_area',
        'created_date',
        'verified_date',
        'date_of_join',
        'profile_image',
        'user_type',
        'name',
        'email',
        'password',
        'phone_no',
        'location',
        'otp',
        'otp_verify',
        'state_id',
        'city_id',
        'district_id',
        'referral_id',
        'company_name',
        'contact_person_name',
        'category',
        'gst',
        'company_email',
        'address',
        'address_1',
        'city',
        'pincode',
        'working_status_id',
        'id_proof',
        'address_proof',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'state_id' => 'integer',
        'pincode' => 'integer',
        'phone_no' => 'integer',
        'working_status_id'=>'integer',


    ];

    public function stateName(){
        return $this->belongsTo(State::class,'state_id','state_id');
    }

    public function cityName(){
        return $this->belongsTo(City::class,'city_id','city_id');
    }

    public function districtName(){
        return $this->belongsTo(District::class,'district_id','district_id');
    }
}
