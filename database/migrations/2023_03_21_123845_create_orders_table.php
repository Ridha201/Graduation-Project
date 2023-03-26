<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('userID');
            $table->string('name');
            $table->string('lastname');
            $table->string('address1');
            $table->string('address2')->nullable();
            $table->string('state');
            $table->string('email')->unique();
            $table->string('zipcode');
            $table->string('ordernumber');
            $table->string('status');
            $table->string('message')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone');
            $table->rememberToken();
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
        Schema::dropIfExists('orders');
    }
}
