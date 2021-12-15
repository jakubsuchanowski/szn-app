<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlaceActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('place_activities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('province');
            $table->string('city');
            $table->string('street');
            $table->string('buildingNumber');
            $table->string('postcode');


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
        Schema::dropIfExists('place_activities');
    }
}
