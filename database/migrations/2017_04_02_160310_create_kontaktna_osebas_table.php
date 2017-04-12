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
            $table->integer('sifra_kontaktna_oseba');
            $table->string('sifra_razmerja');
            $table->string('ime', 200);
            $table->string('priimek', 200);
            $table->string('naslov', 200);
            $table->string('tel_stevilka', 10);
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
