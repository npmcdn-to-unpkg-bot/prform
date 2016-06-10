<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectVisual extends Model
{
    protected $table = 'project_visual';	//Declare table name
    protected $primaryKey = 'project_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable =   [
                                'project_id',
                                'sitemap',
                                'referance_websites',
                                'referance_similarities',
                                'preferred_color_1',
                                'preferred_color_2',
                                'other_notes'
                            ];
}
