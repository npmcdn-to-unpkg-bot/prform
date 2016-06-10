<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProjectTimelineToProjectCodings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('project_codings', function (Blueprint $table) {
            $table->string('project_timeline',60)->after('awarded_to');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('project_codings', function(Blueprint $table)
          {
            Schema::drop('project_codings');
          });
    }
}
