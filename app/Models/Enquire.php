<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquire extends Model
{
    protected $table='enquires';
    protected $primaryKey='enquire_id';
    protected $guarded;

    protected $casts = [
        'user_id' => 'integer',
        'state_id' => 'integer',
        'city_id' => 'integer',
        'pincode' => 'string',
        'ph_number' => 'integer',
        'status' => 'integer',

    ];
}
