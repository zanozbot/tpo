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
            $table->date('datum_obiska');
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
