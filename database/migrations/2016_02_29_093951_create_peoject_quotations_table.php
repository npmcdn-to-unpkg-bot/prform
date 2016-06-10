<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeojectQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
     {
       Schema::create('project_quotations', function (Blueprint $table) {
            $table->increments('id'); 
            $table->integer('project_id')->unsigned(); 
            $table->string('sender_id');  
            $table->string('vendor_name');
            $table->string('email'); 
            $table->string('price'); 
            $table->string('days');
            $table->string('message');          
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
       Schema::drop('project_quotations');
     }
}
