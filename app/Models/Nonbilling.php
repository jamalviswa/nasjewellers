<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nonbilling extends Model
{
    use HasFactory;

    protected $table = 'nonbillings';

    protected $fillable = ['customer_name','customer_id','mobile_number','address','date','weight','balance_weight','net_weight'];
}
