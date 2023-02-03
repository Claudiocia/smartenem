<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateFotosTable.
 */
class CreateFotosTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fotos', function(Blueprint $table) {
            $table->id();
            $table->string('name_orig');
            $table->string('name');
            $table->string('path');
            $table->string('aplic');
            $table->string('credito')->nullable();
            $table->string('legenda')->nullable();
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
		Schema::drop('fotos');
	}
}
