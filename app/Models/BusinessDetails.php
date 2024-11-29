<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessDetails extends Model
{
    use HasFactory;
    protected $table="business_details";
    protected $primaryKey="business_id";
    protected $guarded;

    protected $casts = [
        'state_id' => 'integer',
        'pincode' => 'integer',
        'contact_number' => 'integer',
    ];
}
