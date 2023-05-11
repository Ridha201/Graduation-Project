<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PSU extends Model
{
    use HasFactory;
    protected $table = 'p_s_u_s';
    protected $fillable = [
        'productID',
        'wattage',
    ];
}
