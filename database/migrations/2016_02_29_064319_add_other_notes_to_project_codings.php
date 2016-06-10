<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOtherNotesToProjectCodings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('project_codings', function (Blueprint $table) {
            $table->string('other_note')->after('invision_password');
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
