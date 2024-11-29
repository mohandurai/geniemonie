<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CallManagement extends Model
{
    use HasFactory;
    protected $table="call_management";
    protected $primaryKey="call_management_id";
    protected $guarded;
}
