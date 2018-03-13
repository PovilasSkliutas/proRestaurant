<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{

    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('people_amount');
            $table->date('date');
            $table->time('time');
            $table->string('phone');
            $table->integer('user_id')->unsigned();
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
