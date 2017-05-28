<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZdravilosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zdravilo', function (Blueprint $table) {
            $table->string('sifra_zdravilo');
            $table->string('ime', 200);
            $table->string('opis', 200);
            $table->integer('cena');
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
        Schema::dropIfExists('zdravilo');
    }
}
