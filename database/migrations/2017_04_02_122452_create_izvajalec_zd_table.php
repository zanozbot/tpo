<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIzvajalecZdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('izvajalec_zd', function (Blueprint $table) {
            $table->integer('sifra_zd');
            $table->integer('postna_stevilka')->references('postna_stevilka')->on('posta');
            $table->string('naziv', 200);
            $table->string('naslov', 200);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('izvajalec_zd');
    }
}
