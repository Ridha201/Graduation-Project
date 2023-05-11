<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GPU extends Model
{
    use HasFactory;
    protected $table = 'g_p_u_s';
    protected $fillable = [
        'productID',
        'wattage',
    ];
}
