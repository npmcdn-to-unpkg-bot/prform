<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_details', function (Blueprint $table)
        {
            $table->integer('project_id')           ->unsigned()  ->index();

            $table->integer('industry_id')          ->unsigned()  ->index();
            $table->text('business_description');
            $table->enum('sales_cahnnel', ['B2B', 'B2C'])->default('B2B');
            $table->text('product_details');
            $table->text('terget_audience_description');
            $table->text('competitor_list');
            $table->text('unique_selling_points');
            $table->text('other_notes');

            $table->timestamps();

            $table->primary('project_id');

        //Foreign Keys
            $table->foreign('project_id')           ->references('id')->on('projects');
            $table->foreign('industry_id')          ->references('id')->on('industries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('project_details');
    }
}
