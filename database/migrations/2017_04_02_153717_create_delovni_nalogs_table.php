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
            $table->increments('sifra_dn');
            $table->integer('sifra_delavec');
            $table->string('sifra_bolezen');
            $table->integer('sifra_vrsta_obisk');
            $table->string('barva_epruvete', 200)->nullable();
            $table->integer('stevilo_epruvet')->nullable();
            $table->date('datum_prvega_obiska');
			$table->date('datum_koncnega_obiska')->nullable();
            $table->boolean('datum_obvezen');
            $table->integer('stevilo_obiskov');
            $table->integer('casovni_interval')->nullable();
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
        Schema::dropIfExists('delovni_nalog');
    }
}
