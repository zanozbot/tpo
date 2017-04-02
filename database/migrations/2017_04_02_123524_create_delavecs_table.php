<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDelavecsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delavec', function (Blueprint $table) {
            $table->integer('sifra_delavec');
            $table->integer('sifra_vloga');
            $table->integer('sifra_zd');
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
        Schema::dropIfExists('delavec');
    }
}
