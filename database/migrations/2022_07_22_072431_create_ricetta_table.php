<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ricetta', function (Blueprint $table) {

            $table->id('id_ricetta');
            $table->unsignedBigInteger('id_utente');

            $table->string('titolo');
            $table->string('introduzione');
            $table->string('preparazione');
            $table->string('tipologia');
            $table->string('difficolta');
            $table->timestamps();

            $table->foreign('id_utente')->references('id_utente')->on('utente');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ricetta');
    }
};
