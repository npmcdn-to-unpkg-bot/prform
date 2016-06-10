<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectOppertunitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('project_oppertunities', function (Blueprint $table)
		{
			$table->integer('project_id')			->unsigned()  ->index();
			$table->integer('platform_id')			->unsigned()  ->index();
            $table->text('notes');
			$table->timestamps();

			$table->primary('project_id');

		//Foreign Keys
			$table->foreign('project_id')			->references('id')->on('projects');
			$table->foreign('platform_id')			->references('id')->on('platforms');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('project_oppertunities');
    }
}
