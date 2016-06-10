<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableLookFeelFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('look_feel_fields', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sitemap');   
            $table->string('look_and_fell');
            $table->string('references_website');
            $table->string('about_references');
            $table->string('related_documents');
            $table->string('preferend_fonts');
            $table->string('prefers_color');               
            $table->string('other_notes');          
            $table->timestamps();             
          }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
     {
       Schema::drop('look_feel_fields');
     }
} 
