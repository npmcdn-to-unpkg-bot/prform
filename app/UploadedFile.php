<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UploadedFile extends Model
{
    protected $table = 'uploaded_files';	//Declare table name

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable =   [
                                'file_location_local',
                                'original_file_name'
                            ];
}
