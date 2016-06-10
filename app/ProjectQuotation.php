<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectQuotation extends Model
{
    protected $table = 'project_quotations';
    protected $fillable = [
                             'project_id',
                             'email',
                             'price',                             
                           ];
}
