<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectHostingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_hosting', function (Blueprint $table)
        {
            $table->integer('project_id')           ->unsigned()  ->index();

            $table->enum('need_us_to_register', ['yes', 'no'])->default('no');
            $table->string('domain_to_be_used');
            $table->string('domains_to_be_redirected');
            $table->enum('existing_hosting_accounts', ['yes', 'no'])->default('no');
            $table->enum('willing_to_switching_to_our_hosting', ['yes', 'no'])->default('no');
            $table->text('hosting_details');

            $table->string('company_registration_no');
            $table->string('nric_no');

            $table->string('dh_renewal_name');
            $table->string('dh_renewal_company_name');
            $table->string('d_h_renewal_email');
            $table->string('d_h_renewal_company_address');
            $table->string('d_h_renewal_mobile_no');
            $table->string('d_h_renewal_postal_code');

            $table->text('other_notes');

            $table->timestamps();
            $table->primary('project_id');

            //Foreign Keys
            $table->foreign('project_id')           ->references('id')->on('projects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('project_hosting');
    }
}
