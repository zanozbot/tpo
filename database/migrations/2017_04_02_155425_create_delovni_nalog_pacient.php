<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDelovniNalogPacient extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delovni_nalog_pacient', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pacient_stevilka_KZZ');
            $table->integer('delovni_nalog_sifra_dn');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('delovni_nalog_pacient');
    }
}
