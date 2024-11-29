<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StateManagerCommision extends Model
{
    protected $table='state_manager_commision';
    protected $primaryKey='smc_id';
    protected $fillable=['direct_ad', 'fran_paid_ad', 'user_id'];
}
