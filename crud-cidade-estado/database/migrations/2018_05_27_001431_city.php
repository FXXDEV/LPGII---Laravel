<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class City extends Migration
{
   /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->morphs('state');
            $table->string('state')->references('name')->on('states');
            $table->string('hab');
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
        Schema::dropIfExists('cities');
    }
}
