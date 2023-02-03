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
        Schema::create('apoio_questao', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('apoio_id')->unsigned();
            $table->foreign('apoio_id')->references('id')->on('apoios');
            $table->bigInteger('questao_id')->unsigned();
            $table->foreign('questao_id')->references('id')->on('questaos');
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
        Schema::dropIfExists('apoio_questao');
    }
};
