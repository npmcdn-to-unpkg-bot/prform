<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectCostSubcategory extends Model
{
   protected $table = 'project_cost_subcategories';
   protected $fillable =   [
	                           'category_id'
	                       ];
}
