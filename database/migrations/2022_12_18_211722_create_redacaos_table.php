<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateRedacaosTable.
 */
class CreateRedacaosTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('redacaos', function(Blueprint $table) {
            $table->id();
            $table->text('tema');
            $table->string('ano');
            $table->string('titulo');
            $table->text('apresent');
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
		Schema::drop('redacaos');
	}
}
