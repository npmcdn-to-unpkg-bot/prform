<?php

namespace App\Http\Controllers\Admin;

use Request;
use App\Http\Controllers\Controller;
use App\ProjectType;
use App\User;
use App\Project;
use App\Feature;
use App\Platform;
use App\FeatureProject;
use App\ProjectOppertunity;
use App\RelatedDocuments;
use Auth;
use DB;
use Illuminate\Support\Facades\Redirect;
use Validator;
use Illuminate\Support\Facades\Input;

/*
	Functionality	-> Handel All Admin Works
	Access			-> Only Admin
	Created At		-> 05/02/2016
	Created by		-> S. M. Abrar Jahin
*/

class AdminController extends Controller
{
	/*
		URL				-> No URL
		Functionality	-> Add default middleware to all functions into this class
		Access			-> Only Admin
		Created At		-> 05/02/2016
		Created by		-> S. M. Abrar Jahin
	*/
	public function __construct()
	{
		$this->middleware('admin');			//, ['except' => 'logout']
	}

	/*
		URL				-> get : /add_new_project
		Functionality	-> Add Project View
		Access			-> Only Admin
		Created At		-> 05/02/2016
		Updated At		-> 05/02/2016
		Created by		-> S. M. Abrar Jahin
	*/
	public function showAddProject()
	{
		$project_types = ProjectType::orderBy('name', 'asc')
                            ->get();
		$users = User::select('id','full_name')
                    ->where('is_enabled', '=', 'enabled')
                    ->whereNotIn('user_type', ['admin'])
                    ->orderBy('full_name', 'asc')
                    ->get();

		return view('admin.pages.add_new_project.main', [
														'project_types' => $project_types,
														'users' 		=> $users,
                                                        'status'         => '1'
													]);
	}

	/*
		URL				-> post : /add_new_project
		Functionality	-> Add Project Process
		Access			-> Only Admin
		Created At		-> 05/02/2016
		Updated At		-> 07/02/2016
		Created by		-> S. M. Abrar Jahin
	*/
	public function addProjectPost()
	{
		$requestData = Request::all();

        $validator = Validator::make(
                                        $requestData,
                                        [
                                            'project_title'			=> 'required',
                                            'proposal_no'			=> 'required|unique:projects|alpha_num',
                                            'project_type_id'		=> 'required|not_in:0',
                                            'date'					=> 'required|date|after:today',
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

        //Add Project - Start
        $project = new Project;

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
        
        \Session::flash('success','Successfully Added Project');  
        //Add Project - End

        //This return is only for testing
        return Redirect::to('porject_edit/'.$project->proposal_no);

        //Main Return
        return Redirect::back()
                    ->withErrors(
                                    [
                                        '<a href="'.url('porject_edit/'.$project->proposal_no).'" target="_blank">"'.
                                        'Project - "'.$requestData['proposal_no'].'" Successfully added'
                                        .'"</a>'
                                    ]
                                );
	}

    /*
        URL             -> get : /project_opportunity/{proposal_no}
        Functionality   -> Project Oppertunity
        Access          -> Only Admin
        Created At      -> 07/02/2016
        Updated At      -> 07/02/2016
        Created by      -> S. M. Abrar Jahin
    */
    public function opportunityProject($proposal_no)
    {
    	$project = Project::select(
                                        'id',
                                        'project_type_id'
                                    )
                            ->where('creator_id', Auth::user()->id)
                            ->where('proposal_no', $proposal_no)
                            ->firstOrFail();

		//Already Selected Data - Start
		$project_oppertunity = ProjectOppertunity::select(
                                                            'project_id',
                                                            'platform_id',
                                                            'notes',
                                                            'presigned_proposal',
                                                            DB::raw('DATE_FORMAT(created_at,"%d %b %Y") as date')
                                                        )
                                                ->where('project_id', $project->id)
                                                ->first();

        $feature_project = FeatureProject::select(
                                                    'feature_id'
                                                )
                                                ->where('project_id', $project->id)
                                                ->pluck('feature_id')
                                                ->toArray();
		//Already Selected Data - END

		$project_types	= ProjectType::orderBy('name', 'asc')
							->get();

		$platforms		= Platform::orderBy('name', 'asc')
							->get();

		$features		= Feature::orderBy('name', 'asc')
							->get();

        return view('admin.pages.project_opportunity.main', [
														'current_project'		=> $project,
                                                        'project_oppertunity'	=> $project_oppertunity,
                                                        'feature_project'		=> $feature_project,
														'project_types'			=> $project_types,
														'platforms'				=> $platforms,
														'features'				=> $features
                                                    ]);
    }

    /*
        URL             -> post : /project_opportunity/{proposal_no}
        Functionality   -> Project Oppertunity Process
        Access          -> Only Admin
        Created At      -> 07/02/2016
        Updated At      -> 07/02/2016
        Created by      -> S. M. Abrar Jahin
    */
    public function opportunityProjectPost($proposal_no)
     {     

    	$requestData = Request::all();
        $validator = Validator::make(
                                        $requestData,
                                        [
                                            'project_type_id'		=> 'required|not_in:0',
                                            'platform_id'			=> 'required|not_in:0',
                                            'notes'					=> 'required',
                                            'feature_id'            => 'array|required'
                                        ],
                                        [
											'project_type_id.not_in'		=>'Please Select a Project Type',
											'platform_id.not_in'			=>'Please Select a Platform',
											'notes.required'				=>'Please put any note in "Other Notes"',
                                            'feature_id.required'           =>'Please Select at least a Fature'
                                        ]
                                    );

        //Validator Failed
        if ($validator->fails())
        {
            return Redirect::back()
            				->withErrors($validator)
                            ->withInput();
        }

        //Everything OK, So input the Data into DB or Update DB
            //Update Project Type into projects table - Start
                $project                    = Project::firstOrNew(array('proposal_no' => $proposal_no ));
                $project->project_type_id   = $requestData['project_type_id'];
                $project->save();
            //Update Project Type - End

              if(!empty($_FILES['presigned_proposal'])){ 
                   $file_name =  Input::file('presigned_proposal');
                   $path_name  = 'uploads/presigned_proposal/'.$project->id;
                   $name = $file_name->getClientOriginalName();
                   $success = $file_name->move($path_name,$name);
                   $presigned_proposal = $path_name.'/'.$name;
                }             

            //Update Project Type - Start
                $project_oppertunity                = ProjectOppertunity::firstOrNew(array('project_id' => $project->id ));
                $project_oppertunity->platform_id   = $requestData['platform_id'];
                $project_oppertunity->notes         = $requestData['notes'];
              if(!empty($_FILES['presigned_proposal'])){    
                $project_oppertunity->presigned_proposal = $presigned_proposal;
               } 
                $project_oppertunity->save();
            //Update Project Type - End

          

            //Update Project Feature - Start
                //Delete Previous Entries - Start
                    FeatureProject::where('project_id', '=', $project->id)->delete();
                //Delete Previous Entries - END

                //Add New Data - Start
                    FeatureProject::InsertData($project->id,$requestData['feature_id']);
                //Add New Data - END
            //Update Project Feature - End

        //Update or insert done
        return Redirect::back()
                    ->withErrors(
                                    [
                                        'Project - "'.$proposal_no.'" Successfully Updated'
                                    ]
                                );
      }

    public function backDashboard($proposal_no)  
      {
         return Redirect::to('porject_edit/'.$proposal_no);
      }

    public function addRelatedDocumentsPost($proposal_no) 
      {
         $project = Project::where('proposal_no',$proposal_no)->first();      

            if(!empty($_FILES['myfile'])){             

                  $file_name =  Input::file('myfile'); 
                   
                   $path_name  = 'uploads/related_documents/'.$project->id;
                   $name = $file_name->getClientOriginalName();
                   $success = $file_name->move($path_name,$name);


                   $related_documents = new RelatedDocuments(); 
                   $related_documents->project_id = $project->id;
                   $related_documents->file_name  =  $path_name.'/'.$name;
                   
                  $related_documents->save();                   
                      
                   } 

       } 

   public function approveProjectProposal()
      {         
         $project_id = Input::get('project_id');

         $projectoppertunity = ProjectOppertunity::find($project_id);
         $projectoppertunity->status = '1';
         $projectoppertunity->save();
      } 

   public function deleteRelatedDocuments()
     {
        $document_id = Input::get('document_id');
        RelatedDocuments::destroy($document_id);
     }        



}
