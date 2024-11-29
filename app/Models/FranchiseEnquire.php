<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FranchiseEnquire extends Model
{
    use HasFactory;
    protected $table='franchise_enquire';
    protected $primaryKey='franchise_enquire_id';
    protected $fillable=['uid','company_name','contact_person_name','category','gst_no','company_email', 'contact_no','address', 'state_id','city_id','pincode','status'];
    // protected $guarded;
}
