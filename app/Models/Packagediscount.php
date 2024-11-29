<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Packagediscount extends Model
{
    protected $table='package_discount';
    protected $primaryKey='id';
    protected $fillable=['package_name','months_3','months_6','year_1'];
}
