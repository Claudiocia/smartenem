<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateFormulasTable.
 */
class CreateFormulasTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('formulas', function(Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('aplic');
            $table->text('descri');
            $table->bigInteger('disciplina_id')->unsigned();
            $table->foreign('disciplina_id')->references('id')->on('disciplinas');
            $table->bigInteger('foto_id')->unsigned();
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
		Schema::drop('formulas');
	}
}
