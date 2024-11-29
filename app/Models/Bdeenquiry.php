<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bdeenquiry extends Model
{
    protected $table='bde_enquiry';
    protected $primaryKey='bde_enq_id';
    protected $fillable=['uid','email','address','city_id','state_id','current_status_working','profession_status','upload_id_proof','address_proof','status'];
}
