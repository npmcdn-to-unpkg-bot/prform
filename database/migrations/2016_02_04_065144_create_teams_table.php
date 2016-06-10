<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('name', 100)->unique();
            $table->integer('sales_person_id')      ->unsigned()  ->index();
            $table->integer('project_manager_id')   ->unsigned()  ->index();
            $table->integer('designer_id')          ->unsigned()  ->index();
            $table->integer('tech_support_id')      ->unsigned()  ->index();

            //Foreign Keys
            $table->foreign('sales_person_id')      ->references('id')->on('users');
            $table->foreign('project_manager_id')   ->references('id')->on('users');
            $table->foreign('designer_id')          ->references('id')->on('users');
            $table->foreign('tech_support_id')      ->references('id')->on('users');

            //Composite Primary Key
            $table->unique([
                                'sales_person_id',
                                'project_manager_id',
                                'designer_id',
                                'tech_support_id'
                            ],'teams_composite_key');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('teams');
    }
}
