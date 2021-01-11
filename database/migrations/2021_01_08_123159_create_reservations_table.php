<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->index();
            $table->date('checkin')->nullable();
            $table->date('checkout')->nullable();
            $table->dateTime('reservation_in')->nullable();
            $table->dateTime('checkin')->nullable();
            $table->dateTime('reservation_out')->nullable();
            $table->dateTime('checkout')->nullable();
            $table->integer('cost');
            $table->string('states');
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
        Schema::dropIfExists('reservations');
    }
}
