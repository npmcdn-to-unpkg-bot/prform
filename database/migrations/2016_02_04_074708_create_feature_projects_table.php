<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeatureProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feature_projects', function (Blueprint $table)
        {
            //$table->increments('id');
            $table->integer('project_id')       ->unsigned()  ->index();
            $table->integer('feature_id')       ->unsigned()  ->index();
            $table->timestamp('created_at')     ->default(DB::raw('CURRENT_TIMESTAMP'));

            //Foreign Keys
            $table->foreign('project_id')       ->references('id')->on('projects');
            $table->foreign('feature_id')       ->references('id')->on('features');

            //Composite Primary Key
            $table->unique([
                                'project_id',
                                'feature_id'
                            ],'feature_projects_composite_key');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('feature_projects');
    }
}
