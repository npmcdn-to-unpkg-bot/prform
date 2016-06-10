<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{
    protected $table = 'industries';	//Declare table name
    public $timestamps = false;			//Disabling timestamps attribute

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable =   [
                                'name'
                            ];
}
