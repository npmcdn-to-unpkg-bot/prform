<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectDetails extends Model
{
	protected $table        = 'project_details';	//Declare table name
	protected $primaryKey   = 'project_id';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable =   [
								'project_id',
								'industry_id',
								'business_description',
								'sales_cahnnel',
								'product_details',
								'terget_audience_description',
								'competitor_list',
								'unique_selling_points',
								'other_notes'
							];
}
