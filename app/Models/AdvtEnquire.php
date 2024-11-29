<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvtEnquire extends Model
{
    use HasFactory;
    protected $table='advt_enquiry';
    protected $primaryKey='adv_enq_id ';
    protected $fillable=['uid','company_shop_name','contact_person_name','category','gst','company_email', 'referral_mobile_id','address', 'state_id','city_id','pincode','status'];
    // protected $guarded;
}
