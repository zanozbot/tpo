<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAktivnostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aktivnost', function (Blueprint $table) {
            $table->increments('aid');
            $table->integer('sifra_storitve');
            $table->string('ime_storitve');
            $table->integer('sifra_aktivnosti');
            $table->string('ime_aktivnosti');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aktivnost');
    }
}
