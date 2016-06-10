<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected  $table = 'portforlios';
    protected $fillable = [
                            'name',
                            'link'                            
                          ];
}
