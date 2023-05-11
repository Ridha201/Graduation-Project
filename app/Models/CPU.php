<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CPU extends Model
{
    use HasFactory;
    protected $table = 'c_p_u_s';
    protected $fillable = [
        'productID',
        'brand',
        'wattage',
    ];
}
