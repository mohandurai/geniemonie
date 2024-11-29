<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentWriterCommision extends Model
{
    protected $table='content_writer_commision';
    protected $primaryKey='cwc_id';
    protected $fillable=['direct_ad', 'fran_paid_ad', 'user_id'];
}
