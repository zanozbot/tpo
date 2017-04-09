<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatronaznaSestraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patronazna_sestra', function (Blueprint $table) {
            $table->integer('sifra_ps');
            $table->integer('sifra_okolis')->references('sifra_okolis')->on('okolis')->default(0);
            $table->integer('sifra_zd')->references('sifra_zd')->on('izvajalec_zd');
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
        Schema::dropIfExists('patronazna_sestra');
    }
}
