<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectCostBreakdown extends Model
{
    protected $table = 'project_cost_breakdowns';
    protected $fillable = [
                              'project_id'
                           ];   
}
