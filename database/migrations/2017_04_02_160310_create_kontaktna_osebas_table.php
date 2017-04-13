<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKontaktnaOsebasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kontaktna_oseba', function (Blueprint $table) {
			$table->increments('id_kontakt');
            $table->integer('id_uporabnik')->references('id_uporabnik')->on('uporabnik');
            $table->string('sifra_razmerje');
            $table->string('ime', 200);
            $table->string('priimek', 200);
            $table->string('tel_stevilka', 10);
			$table->integer('postna_stevilka');
            $table->string('ulica', 100);
			$table->string('kraj', 100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kontaktna_oseba');
    }
}
