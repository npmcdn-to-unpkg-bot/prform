<?php

namespace App\Http\Controllers\Admin;

use Request;
use App\Http\Controllers\Controller;
use App\ProjectType;
use App\User;
use App\Project;
use Auth;
use Illuminate\Support\Facades\Redirect;
use Validator;

/*
	Functionality	-> Handel Project Edit
	Access			-> Only Admin
	Created At		-> 10/02/2016
	Created by		-> S. M. Abrar Jahin -> abrarjahin@outlook.com
*/

class PorjectEditController extends Controller
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
        URL             -> get : /project_edit/{proposal_no}
        Functionality   -> Project Oppertunity
        Access          -> Only Admin
        Created At      -> 09/02/2016
        Updated At      -> 09/02/2016
        Created by      -> S. M. Abrar Jahin -> abrarjahin@outlook.com
    */
    public function editProject($proposal_no)
    {  //die('lghkjghlj');  
	/* 
		$project = Project::where('creator_id', Auth::user()->id)
						->where('proposal_no', $proposal_no)
						->firstOrFail(); */

		$project = Project::where('proposal_no', $proposal_no)                       
                        ->firstOrFail();

        $project_types = ProjectType::orderBy('name', 'asc')
									->get();
		$users = User::select('id','full_name')
					->where('is_enabled', '=', 'enabled')
					->where('user_type','!=','admin')
					->orderBy('full_name', 'asc')
					->get();
     
        return view('admin.pages.porject_edit.main', [
                                                        'project_types' 	=> $project_types,
                                                        'current_project'	=> $project,
                                                        'users'				=> $users,
                                                        'proposal_no'       => $proposal_no														
                                                    ]);
    }

    /*
        URL             -> post : /project_edit/{proposal_no}
        Functionality   -> Project Oppertunity Process
        Access          -> Only Admin
        Created At      -> 09/02/2016
        Updated At      -> 09/02/2016
        Created by      -> S. M. Abrar Jahin -> abrarjahin@outlook.com
    */
    public function editProjectPost($proposal_no)
    { 
    	$requestData = Request::all();

		/*$project = Project::where('creator_id', Auth::user()->id)
						->where('proposal_no', $proposal_no)
						->firstOrFail();*/
         $project = Project::where('proposal_no', $proposal_no)                       
                        ->firstOrFail();               

        $validator = Validator::make(
                                        $requestData,
                                        [
                                            'project_title'			=> 'required',
                                            'proposal_no'			=> 'required|alpha_num',
                                            'project_type_id'		=> 'required|not_in:0',
                                           // 'date'					=> 'required|date|after:today',
                                            'company_name'			=> 'required',
                                            'company_address'		=> 'required',
                                            'company_telephone'		=> 'required',
                                            'company_fax'			=> 'required',
                                            'contact_salutation'	=> 'required|not_in:0',
                                            'contact_first_name'	=> 'required',
                                            'contact_last_name'		=> 'required',
                                            'contact_telephone'		=> 'required',
                                            'contact_mobile'		=> 'required',
                                            'contact_email'			=> 'required|email',
                                            'sales_person_id'		=> 'required|not_in:0',
                                            'project_manager_id'	=> 'required|not_in:0',
                                            'designer_id'			=> 'required|not_in:0',
                                            'tech_support_id'		=> 'required|not_in:0'
                                        ],
                                        [
											'proposal_no.unique'			=>'Proposal No Already Registered, Please Try A Different Proposal No',
											'proposal_no.alpha_num'			=>'The Proposal Number May Only Contain Letters and Numbers, No Special Characters',
											'date.after'					=>'Please Give A Date After Today',
											'project_type_id.not_in'		=>'Please Select A Project Type',
											'contact_salutation.not_in'		=>'Please Select A Salutation',
											'sales_person_id.not_in'		=>'Please Select A Sales Person',
											'project_manager_id.not_in'		=>'Please Select A Manager',
											'designer_id.not_in'			=>'Please Select A Designer',
											'tech_support_id.not_in'		=>'Please Select A Tech Support'
                                        ]
                                    );

        //Validator Failed
        if ($validator->fails())
        {
            return Redirect::back()
            				->withErrors($validator)
                            ->withInput();
        }

        //Edit Project - Start
            $project->creator_id			= Auth::user()->id;
            $project->project_title			= $requestData['project_title'];
            $project->proposal_no			= $requestData['proposal_no'];
            $project->project_type_id		= $requestData['project_type_id'];
            $project->date					= $requestData['date'];
            $project->company_name 			= $requestData['company_name'];
            $project->company_address		= $requestData['company_address'];
            $project->company_telephone		= $requestData['company_telephone'];
            $project->company_fax			=  $requestData['company_fax'];
            $project->contact_salutation	= $requestData['contact_salutation'];
            $project->contact_first_name    = $requestData['contact_first_name'];
            $project->contact_last_name		= $requestData['contact_last_name'];
            $project->contact_telephone		= $requestData['contact_telephone'];
            $project->contact_mobile		= $requestData['contact_mobile'];
            $project->contact_email			= $requestData['contact_email'];
            $project->sales_person_id		= $requestData['sales_person_id'];
            $project->project_manager_id	= $requestData['project_manager_id'];
            $project->designer_id	 		= $requestData['designer_id'];
            $project->tech_support_id		= $requestData['tech_support_id'];
            $project->save();
        //Edit Project - End

        return Redirect::back()
                    ->withErrors(
                                    [
                                        'Project - "'.$requestData['proposal_no'].'" Successfully Updated'
                                    ]
                                );
    }
}
