<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LookFeelDocuments extends Model
{
   protected $table = 'look_feel_documents';
   protected $fillable = ['project_id','related_documents'];
}
