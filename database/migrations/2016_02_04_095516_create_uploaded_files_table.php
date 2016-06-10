<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUploadedFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('uploaded_files', function (Blueprint $table)
		{
			$table->increments('id');
			$table->string('original_file_name', 100);
            $table->string('file_location_local', 255)->unique();
			$table->timestamp('created_at');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('uploaded_files');
    }
}
