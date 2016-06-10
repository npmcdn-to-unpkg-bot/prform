<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SignedProposal extends Model
{
    protected $table = 'signed_proposals';	//Declare table name
    public $timestamps = false;     //Disabling timestamps attribute
    protected $primaryKey = 'uploaded_file_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable =   [
                                'project_id',
                                'uploaded_file_id',
                                'is_approved'
                            ];
}
