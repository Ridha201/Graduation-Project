<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MBD extends Model
{
    use HasFactory;
    protected $table = 'm_b_d_s';
    protected $fillable = [
        'productID',
        'compatibility',
        'wattage',
        'mbdFormFactor',
        'ramSlots',
        'ramGen',
        'maxSupportedRamCapacity',
        'maxSupportedRamFrequency',
       

    ];
}
