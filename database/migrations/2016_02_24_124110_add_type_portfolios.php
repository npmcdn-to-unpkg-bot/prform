<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTypePortfolios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('portforlios', function (Blueprint $table) {
            $table->string('type',60)->after('tags');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('portforlios', function(Blueprint $table)
          {
            Schema::drop('portforlios');
          });
    }

    
}
