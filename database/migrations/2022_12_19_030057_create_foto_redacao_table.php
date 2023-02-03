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
        Schema::create('foto_redacao', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('foto_id')->unsigned();
            $table->foreign('foto_id')->references('id')->on('fotos');
            $table->bigInteger('redacao_id')->unsigned();
            $table->foreign('redacao_id')->references('id')->on('redacaos');
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
        Schema::dropIfExists('foto_redacao');
    }
};
