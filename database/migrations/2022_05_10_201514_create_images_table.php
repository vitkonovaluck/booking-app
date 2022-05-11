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
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->string('name', 200);
            $table->string('caption', 30)->nullable();
            $table->boolean('is_primary')->default(false);
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
        Schema::dropIfExists('images');
    }
};
