<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUporabniksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uporabnik', function (Blueprint $table) {
            $table->increments('id_uporabnik');
            $table->integer('sifra_vloga');
            $table->string('ime');
            $table->string('priimek');
            $table->string('email')->unique();
            $table->string('geslo');
            $table->string('tel_stevilka', 10);
            $table->boolean('aktiviran')->default(false);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('uporabnik');
    }
}
