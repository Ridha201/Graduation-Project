<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'name',
        'lastname',
        'address1',
        'address2',
        'state',
        'email',
        'zipcode',
        'ordernumber',
        'message',


    ];

}
