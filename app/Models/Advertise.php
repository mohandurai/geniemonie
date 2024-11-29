<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertise extends Model
{
    use HasFactory;
    protected $table='advt_enquiry';
    protected $primaryKey='advertise_id';
    protected $fillable=['advertise_id','user_type','level_type','user_id','state_id','city_id','pincode_id','business_id','company_name','contact_person_name','category','gst_no','company_email','email','phone_no','address','address_1','adp_id','ad_package_plan_id','online_tax_amount','total_amount','approved_status','pincode'];
    // protected $guarded;

    public function userName(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function packageName(){
        return $this->belongsTo(AdPackage::class,'adp_id','adp_id');
    }
}
