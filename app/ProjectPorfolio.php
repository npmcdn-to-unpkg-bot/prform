<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectPorfolio extends Model
 {
    protected $table = 'project_portfolios';
    protected $fillable = [
                             'project_id',
                             'portfolio_id'
                           ];  
 }
