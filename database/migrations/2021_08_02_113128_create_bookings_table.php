<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('date_arrival')->nullable();
            $table->string('date_departure')->nullable();
            $table->integer('guest_adult')->nullable();
            $table->integer('guest_child')->nullable();
            $table->string('room_type')->nullable();
            $table->double('price')->nullable();
            $table->string('day')->nullable();
            // $table->integer('room_count')->nullable();
            $table->string('email')->nullable();
            $table->string('contact')->nullable();
            $table->time('deleted_at')->nullable();
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
        Schema::dropIfExists('bookings');
    }
}
