<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateNoticiasTable.
 */
class CreateNoticiasTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('noticias', function(Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('fonte')->nullable();
            $table->string('resumo');
            $table->text('texto');
            $table->dateTime('data');
            $table->enum('public', ['s', 'n'])->default('n');
            $table->bigInteger('foto_id')->unsigned()->nullable();
            $table->foreign('foto_id')->references('id')->on('fotos');
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
		Schema::drop('noticias');
	}
}
