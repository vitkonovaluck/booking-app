<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('food_id')->unsigned()->index();
            $table->unsignedBigInteger('room_booking_id')->unsigned()->index();
            $table->integer('quantity')->default(1);
            $table->integer('cost');

            $table->timestamps();

            $table->foreign('food_id')
                ->references('id')->on('food')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('room_booking_id')
                ->references('id')->on('room_bookings')
                ->onUpdate('cascade')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('food_orders');
    }
};
