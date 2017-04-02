<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDelovniNalogZdraviloTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delovni_nalog_zdravilo', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sifra_dn');
            $table->integer('sifra_zdravilo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('delovni_nalog_zdravilo');
    }
}
