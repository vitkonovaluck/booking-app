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
        Schema::create('facility_room_type', function (Blueprint $table) {

            $table->unsignedBigInteger('facility_id')->unsigned();
            $table->unsignedBigInteger('room_type_id')->unsigned();
            $table->timestamps();

            $table->index('facility_id','facility_id_idx');
            $table->foreign('facility_id','facility_id_fk')
                ->on('facilities')
                ->references('id')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->index('room_type_id','room_type_id_idx');
            $table->foreign('room_type_id','room_type_id_fk')
                ->on('room_types')
                ->references('id')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            /*$table->foreign('facility_id')
                ->references('id')->on('facilities')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('room_type_id')
                ->references('id')->on('room_types')
                ->onUpdate('cascade')
                ->onDelete('cascade');
*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facility_room_type');
    }
};
