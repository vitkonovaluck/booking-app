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
        Schema::create('room_bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('room_id')->unsigned()->index();
            $table->unsignedBigInteger('user_id')->unsigned()->index();
            $table->date('arrival_date');
            $table->date('departure_date')->nullable();
            $table->integer('room_cost');
            $table->enum('status', ['pending', 'checked_in', 'checked_out', 'cancelled'])->default('pending');
            $table->boolean('payment')->default(false);
            $table->timestamps();

            $table->foreign('room_id')
                ->references('id')->on('rooms')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('user_id')
                ->references('id')->on('users')
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
        Schema::dropIfExists('room_bookings');
    }
};
