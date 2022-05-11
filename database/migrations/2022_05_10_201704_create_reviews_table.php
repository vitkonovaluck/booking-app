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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('review', 100);
            $table->enum('rating', ['0', '1', '2', '3', '4', '5']);
            $table->enum('approval_status', ['очікується', 'схвалено', 'відхилено'])->default('очікується');
            $table->unsignedBigInteger('room_booking_id')->unsigned()->index();
            $table->timestamps();

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
        Schema::dropIfExists('reviews');
    }
};
