<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class KidsActivities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kids_activities', function (Blueprint $table){
        $table->increments('id');
        $table->unsignedinteger('kid_id');
        $table->foreign('kid_id')
            ->references('id')
            ->on('kids')->onDelete('cascade');

        $table->unsignedBiginteger('activities_id');
        $table->foreign('activities_id')
            ->references('id')
            ->on('activities')->onDelete('cascade');
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
        Schema::dropIfExists('kids_activities');
    }
}
