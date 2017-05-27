<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVrstaObiskasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vrsta_obiska', function (Blueprint $table) {
            $table->integer('sifra_vrsta_obisk');
            $table->boolean('preventivni');
            $table->string('ime');
            $table->string('meritve', 400)->default('');
            $table->boolean('izbrisan')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vrsta_obiska');
    }
}
