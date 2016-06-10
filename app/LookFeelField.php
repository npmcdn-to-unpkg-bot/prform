<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LookFeelField extends Model
{
    protected $table = 'look_feel_fields';
    protected $fillable = [
                            'sitemap'
                          ];
}
