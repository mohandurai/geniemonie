<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkingStatus extends Model
{
    use HasFactory;
    protected $table="working_status";
    protected $primaryKey='working_status_id';
    protected $guarded;
}
