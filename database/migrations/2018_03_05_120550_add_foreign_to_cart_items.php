<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignToCartItems extends Migration
{

    public function up()
    {
        Schema::table('cart_items', function (Blueprint $table) {
            $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onDelete('cascade');
            $table->foreign('dish_id')
                  ->references('id')->on('dishes')
                  ->onDelete('cascade');
            $table->foreign('order_id')
                  ->references('id')->on('orders')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('cart_items', function (Blueprint $table) {
            $table->dropForeign('cart_items_user_id_foreign');
            $table->dropForeign('cart_items_dish_id_foreign');
            $table->dropForeign('cart_items_order_id_foreign');
        });
    }
}
