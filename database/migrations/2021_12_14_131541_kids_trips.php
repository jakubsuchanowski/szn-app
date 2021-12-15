<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class KidsTrips extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kids_trips', function (Blueprint $table){
            $table->increments('id');
            $table->unsignedinteger('kid_id');
            $table->foreign('kid_id')
                ->references('id')
                ->on('kids')->onDelete('cascade');

            $table->unsignedBiginteger('trips_id');
            $table->foreign('trips_id')
                ->references('id')
                ->on('trips')->onDelete('cascade');
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
        Schema::dropIfExists('kids_trips');
    }
}
