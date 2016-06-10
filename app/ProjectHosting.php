<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectHosting extends Model
{
    protected $table        = 'project_hosting';	//Declare table name
    protected $primaryKey   = 'project_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable =   [
								'project_id',

                                'need_us_to_register',
								'domain_to_be_used',
								'domains_to_be_redirected',
								'existing_hosting_accounts',
								'willing_to_switching_to_our_hosting',
								'hosting_details',

								'company_registration_no',
								'nric_no',

								'dh_renewal_name',
								'dh_renewal_company_name',
								'd_h_renewal_email',
								'd_h_renewal_company_address',
								'd_h_renewal_mobile_no',
								'd_h_renewal_postal_code',

								'other_notes'
                            ];
}
