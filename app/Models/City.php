<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table='city';
    protected $primaryKey='city_id';
    protected $fillable=['city_name','pincode','district_id', 'state_id','status', 'user_id'];

    public function districtName(){
        return $this->belongsTo(District::class,'district_id','district_id');
    }

    public function stateName(){
        return $this->belongsTo(State::class,'state_id','state_id');
    }

    protected $casts = [
        'pincode' => 'integer',
    ];

}
