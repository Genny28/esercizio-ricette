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
        Schema::create('contiene', function (Blueprint $table) {
            $table->unsignedBigInteger('id_ricetta');
            $table->unsignedBigInteger('id_ingrediente');

            $table->foreign('id_ricetta')->references('id_ricetta')->on('ricetta');
            $table->foreign('id_ingrediente')->references('id_ingrediente')->on('ingrediente');
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
        Schema::dropIfExists('contiene');
    }
};
