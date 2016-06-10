<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCodingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
     {
        Schema::create('project_codings', function (Blueprint $table) {
            $table->increments('id'); 
            $table->integer('project_id')->unsigned();   
            $table->string('awarded_to');
            $table->string('invision_lik'); 
            $table->string('demo_link'); 
            $table->string('live_lik');
            $table->string('invision_password');          
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
        Schema::drop('projects_codings');
     }
}
