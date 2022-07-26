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
        Schema::create('ospite', function (Blueprint $table) {
            $table->id('id_ospite');
            $table->unsignedBigInteger('id_ricetta');
            $table->string('nome_ospite');
            $table->Integer('voto');

            $table->timestamps();
            $table->foreign('id_ricetta')->references('id_ricetta')->on('ricetta');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ospite');
    }
};
