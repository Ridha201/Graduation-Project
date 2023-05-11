<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
 
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('productName');
            $table->string('productCategory');
            $table->string('globalCategory');
            $table->string('productDescription');
            $table->string('productDetails');
            $table->string('productPrice');
            $table->string('productStock');
            $table->string('productImage');
            $table->string('productImage2');
            $table->string('productImage3');
            $table->string('productSoldTimes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
