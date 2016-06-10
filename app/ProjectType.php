<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectType extends Model
{
    protected $table = 'project_types';	//Declare table name
    public $timestamps = false;		//Disabling timestamps attribute

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable =   [
                                'name'
                            ];
}
