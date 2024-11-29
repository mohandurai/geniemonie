<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BDECommision extends Model
{
    protected $table='bde_commision';
    protected $primaryKey='bdec_id';
    protected $fillable=['fran_app_ad', 'user_id'];
}
