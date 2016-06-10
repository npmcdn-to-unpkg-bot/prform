<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectOppertunity extends Model
{
    protected $table        = 'project_oppertunities';	//Declare table name
    protected $primaryKey   = 'project_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable =   [
								'project_id',
                                'platform_id',
								'notes'
                            ];
}
