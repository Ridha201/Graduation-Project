<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMBDSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_b_d_s', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('productID');
            $table->string('compatibility');
            $table->integer('wattage');
            $table->integer('formFactor');
            $table->integer('ramSlots');
            $table->integer('ramGen');
           

    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_b_d_s');
    }
}
