<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateEventosTable.
 */
class CreateEventosTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('eventos', function(Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('resumo');
            $table->text('texto')->nullable();
            $table->dateTime('data_ini')->nullable();
            $table->dateTime('data_fim')->nullable();
            $table->time('hora_ini')->nullable();
            $table->time('hora_fim')->nullable();
            $table->enum('status', [0, 1, 2])->default(0);
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
		Schema::drop('eventos');
	}
}
