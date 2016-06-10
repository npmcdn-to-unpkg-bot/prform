<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table)
        {
			$table->increments('id');

			$table->integer('creator_id')           ->unsigned()  ->index();

			//Project
			$table->string('project_title', 150);
			$table->string('proposal_no', 150)->unique();
			$table->date('date');
			$table->integer('project_type_id')		->unsigned()  ->index();

			//Company Info
			$table->string('company_name', 100);
			$table->text('company_address');
			$table->string('company_telephone', 20);
			$table->string('company_fax', 20);

			//Contact Person
			$table->enum('contact_salutation', ['Mr.','Mrs.','Miss'])->default('Mr.');
			$table->string('contact_first_name', 50);
			$table->string('contact_last_name', 50);
			$table->string('contact_telephone', 20);
			$table->string('contact_mobile', 20);
			$table->string('contact_email', 50);

			//Team Members
			$table->integer('sales_person_id')      ->unsigned()  ->index();
			$table->integer('project_manager_id')   ->unsigned()  ->index();
			$table->integer('designer_id')          ->unsigned()  ->index();
			$table->integer('tech_support_id')      ->unsigned()  ->index();
			//$table->integer('developing_team_id')   ->unsigned()  ->index();
			$table->timestamps();

		//Foreign Keys
			$table->foreign('creator_id')           ->references('id')->on('users');
			$table->foreign('project_type_id')		->references('id')->on('project_types');
			$table->foreign('sales_person_id')      ->references('id')->on('users');
			$table->foreign('project_manager_id')   ->references('id')->on('users');
			$table->foreign('designer_id')          ->references('id')->on('users');
			$table->foreign('tech_support_id')      ->references('id')->on('users');

			//$table->foreign('developing_team_id')   ->references('id')->on('teams');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('projects');
    }
}
