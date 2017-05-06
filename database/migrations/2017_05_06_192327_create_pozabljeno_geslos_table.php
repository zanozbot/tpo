<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePozabljenoGeslosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pozabljeno_geslo', function (Blueprint $table) {
            $table->integer('id_uporabnik');
            $table->string('token');
            $table->string('geslo');
            $table->boolean('dirty')->default(false);
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
        Schema::dropIfExists('pozabljeno_geslo');
    }
}
