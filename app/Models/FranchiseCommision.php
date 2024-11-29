<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class FranchiseCommision extends Model
{
    protected $table='franchise_commision';
    protected $primaryKey='fc_id';
    protected $fillable=['fran_paid_ad', 'user_id'];
}
