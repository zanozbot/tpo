<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObisksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obisk', function (Blueprint $table) {
            $table->increments('sifra_obisk');
            $table->integer('sifra_dn')->references('sifra_dn')->on('delovni_nalog');
            $table->integer('sifra_plan');
            $table->integer('originalna_sifra_plan');
            $table->integer('sifra_ps');
            $table->integer('sifra_nadomestne_ps')->nullable();
            $table->date('datum_obiska');
            $table->date('datum_opravljenosti_obiska')->nullable();
            $table->boolean('opravljen')->default(false);
            $table->boolean('nadomescanje')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('obisk');
    }
}
