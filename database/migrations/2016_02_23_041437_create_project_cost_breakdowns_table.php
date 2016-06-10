<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectCostBreakdownsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
     {
       Schema::create('project_cost_breakdowns', function (Blueprint $table) {
            $table->increments('id'); 
            $table->integer('project_id')->unsigned();   
            $table->string('module_name');           
            $table->integer('estimated_cost');
            $table->integer('actual_cost');
            $table->integer('quoted_cost'); 
            $table->integer('unique_per_page');            
            $table->timestamps();

            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
        });
     }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::drop('project_cost_breakdowns');
    }
}
