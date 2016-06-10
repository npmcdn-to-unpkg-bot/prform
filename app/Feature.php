<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
	protected $table = 'features';	//Declare table name
	public $timestamps = false;		//Disabling timestamps attribute
	//protected $primaryKey = 'name'; 	//Default Primary Key

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable =   [
	                            'name'
	                        ];
}
