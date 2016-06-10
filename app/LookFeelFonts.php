<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LookFeelFonts extends Model
{
   protected $table = 'look_feel_fonts';
   protected $fillable = ['project_id','preffered_fonts'];
   public $timestamps = false;
}
