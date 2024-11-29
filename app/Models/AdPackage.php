<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdPackage extends Model
{
    protected $table='ad_packages';
    protected $primaryKey='adp_id';
    protected $fillable=['yr1_price','mth6_price','mth3_price','price_mth','package_name', 'package_zone','ad_seconds', 'ad_type','user_id'];
}
