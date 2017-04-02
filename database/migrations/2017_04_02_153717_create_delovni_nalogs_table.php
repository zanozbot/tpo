<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDelovniNalogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delovni_nalog', function (Blueprint $table) {
            $table->integer('sifra_dn');
            $table->integer('stevilka_KZZ');
            $table->integer('sifra_delavec');
            $table->integer('sifra_bolezen');
            $table->integer('sifra_obiska');
            $table->integer('sifra_vrsta_obisk');
            $table->string('barva_krvi', 200);
            $table->date('datum_prvega_obiska');
            $table->boolean('datum_obvezen');
            $table->integer('stevilo_obiskov');
            $table->integer('casovni_interval');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('delovni_nalog');
    }
}
