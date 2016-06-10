<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectCoding extends Model
  {
     protected $table = 'project_codings';
     protected $fillable = ['project_id'];
  }
