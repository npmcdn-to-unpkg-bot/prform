<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';	//Declare table name

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable =   [
								'creator_id',
								'project_title',
								'proposal_no',
								'date',
								'project_type_id',
								'company_name',
								'company_address',
								'company_telephone',
								'company_fax',
								'contact_salutation',
								'contact_first_name',
								'contact_last_name',
								'contact_telephone',
								'contact_mobile',
								'contact_email',
								'sales_person_id',
								'project_manager_id',
								'designer_id',
								'tech_support_id'
                            ];
}
