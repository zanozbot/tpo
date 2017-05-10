<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNadomescanjesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nadomescanje', function (Blueprint $table) {
            $table->increments('nid');
            $table->date('zacetek');
            $table->date('konec');
            $table->integer('sifra_ps');
            // sestro sifra_ps nadomesca nadomestna_sifra_ps
            $table->integer('nadomestna_sifra_ps');
            $table->integer('sifra_obisk');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nadomescanje');
    }
}
