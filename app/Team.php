<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'project_types';	//Declare table name
    public $timestamps = false;		//Disabling timestamps attribute

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable =   [
                                'name',
                                'sales_person_id',
                                'project_manager_id',
                                'designer_id',
                                'tech_support_id'
                            ];
}
