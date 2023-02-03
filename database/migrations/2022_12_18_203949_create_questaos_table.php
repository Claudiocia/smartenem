<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateQuestaosTable.
 */
class CreateQuestaosTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('questaos', function(Blueprint $table) {
            $table->id();
            $table->text('enunciado');
            $table->text('apoio')->nullable();
            $table->string('option_a')->nullable();
            $table->string('option_b')->nullable();
            $table->string('option_c')->nullable();
            $table->string('option_d')->nullable();
            $table->string('option_e')->nullable();
            $table->string('resp');
            $table->text('coment')->nullable();
            $table->string('ano_aplic');
            $table->string('valor')->nullable();
            $table->enum('quest_ouro', ['s', 'n'])->default('n');
            $table->bigInteger('disciplina_id')->unsigned();
            $table->foreign('disciplina_id')->references('id')->on('disciplinas');
            $table->softDeletes();
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
		Schema::drop('questaos');
	}
}
