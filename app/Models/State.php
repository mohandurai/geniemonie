<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table='state';
    protected $primaryKey='state_id';
    protected $fillable=['state_name', 'state_code', 'status', 'user_id'];
    use HasFactory;
}
