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
            $table->integer('sifra_okolis')->references('sifra_okolis')->on('okolis');
            $table->integer('sifra_zd')->references('sifra_zd')->on('izvajalec_zd');
            $table->string('ime', 200);
            $table->string('priimek', 200);            
            $table->string('email', 200);            
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
        Schema::dropIfExists('patronazna_sestra');
    }
}
