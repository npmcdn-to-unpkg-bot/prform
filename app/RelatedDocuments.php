<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RelatedDocuments extends Model
 {
    protected $table = 'related_documentss';	//Declare table name
    public $timestamps = false;		//Disabling timestamps attribute
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable =   [
                                'file_name',                                
                            ];
 }
