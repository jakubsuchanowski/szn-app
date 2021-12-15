<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoreDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('more_data', function (Blueprint $table) {
            $table->id();
            $table->string('secondName')->nullable();
            $table->date('birthdayDate')->nullable();
            $table->string('province')->nullable();
            $table->string('city')->nullable();
            $table->string('street');
            $table->string('buildingNumber')->nullable();
            $table->string('flatNumber')->nullable();
            $table->string('postcode')->nullable();
            $table->string('phoneNumber',8)->nullable();
            $table->string('PESEL',11)->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('more_data');
    }
}
