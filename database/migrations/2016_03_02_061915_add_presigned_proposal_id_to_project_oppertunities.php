<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPresignedProposalIdToProjectOppertunities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('project_oppertunities', function (Blueprint $table) {
           $table->string('presigned_proposal')->after('notes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('project_oppertunities', function (Blueprint $table) {
            Schema::drop('project_oppertunities');
        });
    }
}
