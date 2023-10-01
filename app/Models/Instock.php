<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instock extends Model
{
    use HasFactory;

    protected $table = 'instocks';

    protected $fillable = ['customer_name','mobile_number','address','date','weight'];
}
