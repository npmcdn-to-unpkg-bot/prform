<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectVisualTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_visual', function (Blueprint $table)
        {
            $table->integer('project_id')           ->unsigned()  ->index();
            $table->text('sitemap');
            $table->text('referance_websites');
            $table->text('referance_similarities');
            $table->string('preferred_color_1', 25);
            $table->string('preferred_color_2', 25);
            $table->text('other_notes');
            $table->timestamps();

            $table->primary('project_id');

            //Foreign Keys
            $table->foreign('project_id')           ->references('id')->on('projects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('project_visual');
    }
}
