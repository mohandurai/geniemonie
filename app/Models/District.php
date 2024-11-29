<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table='district';
    protected $primaryKey='district_id';
    protected $fillable=['district_name','state_id', 'status', 'user_id'];

    public function stateName(){
        return $this->belongsTo(State::class,'state_id','state_id');
    }
}
