<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDelavecsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delavec', function (Blueprint $table) {
            $table->integer('sifra_delavec');
            $table->integer('sifra_zd');
            $table->integer('id_uporabnik')->references('id_uporabnik')->on('uporabnik');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('delavec');
    }
}
