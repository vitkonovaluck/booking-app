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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('room_number', 5)->unique();
            $table->text('description');
            $table->boolean('available')->default(true);
            $table->boolean('status')->default(true);
            $table->unsignedBigInteger('room_type_id')->unsigned()->index();
            $table->timestamps();

            $table->foreign('room_type_id')
                ->references('id')->on('room_types')
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
        Schema::dropIfExists('rooms');
    }
};
