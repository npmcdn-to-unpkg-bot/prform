<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('full_name');
            $table->string('user_name')->unique();
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->enum('user_type', ['admin', 'normal_user','super_admin'])->default('normal_user');
            $table->enum('is_enabled', ['enabled', 'disabled'])->default('disabled');
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
