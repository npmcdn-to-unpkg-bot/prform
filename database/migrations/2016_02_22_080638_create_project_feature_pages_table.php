<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectFeaturePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
     {
        Schema::create('project_feature_pages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id')->unsigned();    
            $table->string('page_name');
            $table->string('page_requirements');
            $table->string('page_id');
            $table->string('extra_notes');          
            $table->timestamps(); 

            $table->foreign('project_id')->references('project_id')->on('project_details')->onDelete('cascade');
          }); 
     }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('project_feature_pages');
    }
}
