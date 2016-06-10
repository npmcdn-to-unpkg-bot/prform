<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectCostSubcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
     {
       Schema::create('project_cost_subcategories', function (Blueprint $table) {
            $table->increments('id'); 
            $table->integer('category_id')->unsigned();   
            $table->string('sub_category_name');           
            $table->integer('estimated_cost');
            $table->integer('actual_cost');
            $table->integer('quoted_cost');                     
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('project_cost_breakdowns')->onDelete('cascade');
        });
     }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() 
     {
        Schema::drop('project_cost_subcategories');
     }
}
