<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRAMSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('r_a_m_s', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('productID');
            $table->integer('frequency');
            $table->integer('capacity');
            $table->integer('generation');
            $table->integer('slots');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('r_a_m_s');
    }
}
