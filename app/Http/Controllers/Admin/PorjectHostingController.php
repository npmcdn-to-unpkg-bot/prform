<?php

namespace App\Http\Controllers\Admin;

use Request;
use App\Http\Controllers\Controller;
use App\Project;
use App\ProjectHosting;
use Auth;
use Illuminate\Support\Facades\Redirect;
use Validator;

/*
	Functionality	-> Handel Project Edit
	Access			-> Only Admin
	Created At		-> 10/02/2016
	Created by		-> S. M. Abrar Jahin -> abrarjahin@outlook.com
*/

class PorjectHostingController extends Controller
{
	/*
		URL				-> No URL
		Functionality	-> Add default middleware to all functions into this class
		Access			-> Only Admin
		Created At		-> 09/02/2016
		Created by		-> S. M. Abrar Jahin -> abrarjahin@outlook.com
	*/
	public function __construct()
	{
		$this->middleware('admin');			//, ['except' => 'logout']
	}

    /*
        URL             -> get : /dashBoard
        Functionality   -> Project DashBoard
        Access          -> Only Admin
        Created At      -> 10/02/2016
        Updated At      -> 10/02/2016
        Created by      -> S. M. Abrar Jahin -> abrarjahin@outlook.com
    */
    public function viewPorjectHosting($proposal_no)
    {
    	$project = Project::select(
                                    'id'
                                )
                        ->where('creator_id', Auth::user()->id)
                        ->where('proposal_no', $proposal_no)
                        ->firstOrFail();

		//Previous value for editing - Start
		$project_hosting	= ProjectHosting::where('project_id', $project->id)
								->first();
		//Previous value for editing - End

        return view('admin.pages.porject_hosting.main', [
															'project_hosting'		=> $project_hosting
														]);
    }

    public function porjectHostingPost($proposal_no)
    {
    	$requestData = Request::all();
        $validator = Validator::make(
                                        $requestData,
                                        [
                                            'need_us_to_register'					=> 'required|not_in:0',
                                            'domain_to_be_used'						=> 'required',
                                            'domains_to_be_redirected'				=> 'required',
                                            'existing_hosting_accounts'           	=> 'required|not_in:0',
                                            'willing_to_switching_to_our_hosting'	=> 'required|not_in:0',
                                            'hosting_details'						=> 'required',
                                            'company_registration_no'				=> 'required',
                                            'nric_no'								=> 'required',
                                            'dh_renewal_name'						=> 'required',
                                            'dh_renewal_company_name'				=> 'required',
                                            'd_h_renewal_email'						=> 'required|email',
                                            'd_h_renewal_company_address'			=> 'required',
                                            'd_h_renewal_mobile_no'					=> 'required',
                                            'd_h_renewal_postal_code'				=> 'required',
                                            'other_notes'							=> 'required'
                                        ],
                                        [
											'need_us_to_register.not_in'				=>'Please Select a Option',
											'existing_hosting_accounts.not_in'			=>'Please Select a Option',
											'willing_to_switching_to_our_hosting.not_in'=>'Please Select a Option'
                                        ]
                                    );

        //Validator Failed
        if ($validator->fails())
        {
            return Redirect::back()
            				->withErrors($validator)
                            ->withInput();
        }
        //Everything OK, so insert Data - Start
        	$project                    = Project::firstOrNew(array('proposal_no' => $proposal_no ));

        	//Update Project Hosting - Start
            $project_hosting                		= ProjectHosting::firstOrNew(array('project_id' => $project->id ));

            $project_hosting->need_us_to_register					= $requestData['need_us_to_register'];
            $project_hosting->domain_to_be_used						= $requestData['domain_to_be_used'];
            $project_hosting->domains_to_be_redirected				= $requestData['domains_to_be_redirected'];
            $project_hosting->existing_hosting_accounts				= $requestData['existing_hosting_accounts'];
            $project_hosting->willing_to_switching_to_our_hosting	= $requestData['willing_to_switching_to_our_hosting'];
            $project_hosting->hosting_details						= $requestData['hosting_details'];
            $project_hosting->company_registration_no				= $requestData['company_registration_no'];
            $project_hosting->nric_no								= $requestData['nric_no'];
            $project_hosting->dh_renewal_name						= $requestData['dh_renewal_name'];
            $project_hosting->dh_renewal_company_name				= $requestData['dh_renewal_company_name'];
            $project_hosting->d_h_renewal_email						= $requestData['d_h_renewal_email'];
            $project_hosting->d_h_renewal_company_address			= $requestData['d_h_renewal_company_address'];
            $project_hosting->d_h_renewal_mobile_no					= $requestData['d_h_renewal_mobile_no'];
            $project_hosting->d_h_renewal_postal_code				= $requestData['d_h_renewal_postal_code'];
            $project_hosting->other_notes							= $requestData['other_notes'];

            $project_hosting->save();

          \Session::flash('msg','Successfully Updated');
          //Update Project Hosting - End
          //Everything OK, so insert Data - END
          return Redirect::back();    
    }
}
