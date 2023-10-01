<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jewelry extends Model
{
    use HasFactory;

    protected $table = 'jewelries';

    protected $fillable = ['item_name','quality_type','huid_number','gross_weight'];
}
