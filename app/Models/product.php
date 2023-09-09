<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    public function cpu()
    {
        return $this->hasOne(CPU::class, 'productID', 'id');
    }
    public function gpu()
    {
        return $this->hasOne(GPU::class, 'productID', 'id');
    }
   public function mbd ()
   {
       return $this->hasOne(MBD::class, 'productID', 'id');
   }
   public function psu ()
   {
       return $this->hasOne(PSU::class, 'productID', 'id');
   }
    public function ram ()
    {
         return $this->hasOne(RAM::class, 'productID', 'id');
    }

    public function cases ()
    {
         return $this->hasOne(Cases::class, 'productID', 'id');
    }
}
