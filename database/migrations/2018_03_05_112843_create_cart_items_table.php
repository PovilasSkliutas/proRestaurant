<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartItemsTable extends Migration
{
    public function up()
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('token')->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('dish_id')->unsigned();
            $table->timestamps();
            $table->integer('order_id')->unsigned()->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cart_items');
    }
}
