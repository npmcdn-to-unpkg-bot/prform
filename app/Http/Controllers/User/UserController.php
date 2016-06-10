<?php

namespace App\Http\Controllers\User;

//use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Request;
use Auth;
use Validator;
use DB;
use App\ProjectType;
use App\User;
use App\Project;
use App\Feature;
use App\Platform;
use App\FeatureProject;
use App\ProjectOppertunity;
use App\ProjectCoding;
use App\Project_feature_page;
use App\ProjectQuotation;


class UserController extends Controller
 {
    public function __construct()
     {
       // $this->middleware('user');
     }

    public function showAvailableWorks()
     {
    	return "available_works";
     }

    public function viewUserDashBoard()
     { //echo $userId = Auth::id();
       
     	/*$allprojects = DB::table('projects')
                            ->join('users as sales','projects.sales_person_id','=','sales.id')
                            ->join('users as manager','projects.sales_person_id','=','manager.id')
                            ->join('users as creator','projects.creator_id','=','creator.id')
                            ->select(
                                        'projects.project_title',
                                        'projects.proposal_no',
                                        'sales.full_name as creator_name',
                                        'sales.full_name as sales_man',
                                        'manager.full_name as manager',
                                        DB::raw('DATE_FORMAT(projects.created_at,"%d %b %Y") as date')
                                    )
                            ->where('creator.id','=',Auth::user()->id)
                            ->orderBy('projects.created_at')
                            ->get();*/

         $allprojectcodings = DB::table('projects')
                            ->join('users as sales','projects.sales_person_id','=','sales.id')
                            //->join('users as manager','projects.sales_person_id','=','manager.id')
                            ->join('project_codings','projects.id','=','project_codings.project_id')
                            //->join('users as creator','projects.creator_id','=','creator.id')
                            ->select(   
                            	       'projects.project_title',                                        
                                       'sales.full_name as sales_man',                                       
                                       'project_codings.*'
                                    )
                            ->where('projects.sales_person_id','=',Auth::user()->id)
                            ->orderBy('project_codings.created_at')
                            ->get();   
         //dd($allprojects);                                   

         return view('user.pages.dashboard.main')->with('allprojectcodings',$allprojectcodings);      

     }

    public function viewProject($proposal_no)
      {
      	/*  $project_info = Project::leftjoin('project_types','projects.project_type_id','=','project_types.id')
      	                               ->orderBy('projects.created_at')
      	                               ->where('projects.proposal_no',$proposal_no)
      	                               ->get();*/

      	 $project_info = DB::table('projects')->where('proposal_no',$proposal_no)->first();

      	 return view('user.pages.dashboard.project_main')->with('project_info',$project_info);
      } 

    public function searchUserProject() 
      { 
	      $search_key = Input::get('search_key');

	      if(strlen($search_key) >= 1 && $search_key !='') { 

	        $serachresult = DB::table('projects')
	                            ->join('users as sales','projects.sales_person_id','=','sales.id')
	                            ->join('users as manager','projects.sales_person_id','=','manager.id')
	                            ->join('users as creator','projects.creator_id','=','creator.id')
	                            ->select(
	                                        'projects.project_title',
	                                        'projects.proposal_no',
	                                        'sales.full_name as sales_man',
	                                        'manager.full_name as manager',
	                                        'creator.full_name as creator_name',
	                                        DB::raw('DATE_FORMAT(projects.created_at,"%d %b %Y") as date')
	                                    )
	                            ->where('projects.project_title','like','%'.$search_key.'%')
	                            ->where('creator.id','=',Auth::user()->id)
	                            ->orderBy('projects.created_at')
	                            ->get();

	          echo json_encode($serachresult);    
        }
      }  

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


 	public function showAddProject()
	 {
		$project_types = ProjectType::orderBy('name', 'asc')
                            ->get();
		$users = User::select('id','full_name')
                    ->where('is_enabled', '=', 'enabled')
                    ->whereNotIn('user_type', ['admin'])
                    ->orderBy('full_name', 'asc')
                    ->get();

		return view('user.pages.add_new_project.main', [
														 'project_types' => $project_types,
														 'users' 		=> $users
													   ]);
	 }	
   
   public function AddProjectQuotation()
     {
        $all_projects = Project::all();
        return view('user.pages.qutation.main', [
                                                  'all_projects' => $all_projects
                                                ]);        
     }

   public function searchProjectForQuotation()
     { 
       $project_id = Input::get('project_id');

         $result_array = array();

        if(strlen($project_id) >= 1 && $project_id !='') { 

          $result_array['project_info'] = Project::join('project_types','projects.project_type_id','=','project_types.id')                                                      
                                                      ->join('project_codings','projects.id','=','project_codings.project_id')   
                                                      ->select('project_types.name','projects.id','project_codings.*')
                                                      ->where('projects.id',$project_id)
                                                      ->groupBy('projects.id')
                                                      ->get();
         
          $result_array['feture_pages'] = Project_feature_page::where('project_id',$project_id)->get();
          
          echo json_encode($result_array);

         }  
      } 

   public function AddProjectQuotationPost()
      {
      	//dd($_POST);
      	 $requestData = Request::all();

         $rules = [    
                   'project_id'=>'required',                  
                   'vendor_name'=> 'required',
                   'email'=>'required',
                   'price'=>'required',
                   'day'=>'required',
                   'message'=>'required'                   
                 ];

           $validator=Validator::make(Input::all(),$rules);

           if($validator->fails()){
               return redirect()->back()->withErrors($validator)->withInput();
            }

             $project_quotation = new ProjectQuotation;
             $project_quotation->project_id = $requestData['project_id']; 
             $project_quotation->sender_id = Auth::id();   
             $project_quotation->vendor_name = $requestData['vendor_name']; 
             $project_quotation->email = $requestData['email']; 
             $project_quotation->price = $requestData['price']; 
             $project_quotation->days = $requestData['day']; 
             $project_quotation->message = $requestData['message'];                        
             $project_quotation->save();


             \Session::flash('msg','Successfully Added');
             
			 return Redirect::back();   
         

      }    	




} // end class
