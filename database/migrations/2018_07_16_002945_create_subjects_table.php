<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSubjectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('subjects', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('licenciatura')->nullable()->index('materia_licenciatura_id_fk');
			$table->string('nombre')->nullable();
			$table->integer('fase')->nullable();
			$table->integer('semestre')->nullable();
			$table->string('clave')->nullable();
			$table->string('tipo')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('subjects');
	}

}
