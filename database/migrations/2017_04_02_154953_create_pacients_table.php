<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacient', function (Blueprint $table) {
            $table->integer('stevilka_KZZ');
            $table->integer('postna_stevilka');
            $table->integer('pac_stevilka_KZZ');
            $table->integer('sifra_okolis');
            $table->string('ulica', 100);
			$table->string('kraj', 100);
            $table->date('datum_rojstva');
            $table->string('spol', 1);
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
        Schema::dropIfExists('pacient');
    }
}
