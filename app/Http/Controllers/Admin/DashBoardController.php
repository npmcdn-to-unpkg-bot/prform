<?php

namespace App\Http\Controllers\Admin;

use Request;
use App\Http\Controllers\Controller;
use Auth;
use App\ProjectType;
use App\User;
use App\Project;
use App\Portfolio;
use App\ProjectCoding;
use App\Project_feature_page;
use Illuminate\Support\Facades\Redirect;
use Validator,DB;
use Illuminate\Support\Facades\Input;

/*
	Functionality	-> Handel Project Edit
	Access			-> Only Admin
	Created At		-> 10/02/2016
	Created by		-> S. M. Abrar Jahin -> abrarjahin@outlook.com
*/

class DashBoardController extends Controller
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
    public function viewDashBoard()
      {//   $allprojects = Project::all();

        $allprojects = DB::table('projects')
                            ->join('users as sales','projects.sales_person_id','=','sales.id')
                            ->join('users as manager','projects.sales_person_id','=','manager.id')
                            ->join('users as creator','projects.creator_id','=','creator.id')
                            ->select(
                                        'projects.project_title',
                                        'projects.proposal_no',
                                        'sales.full_name as sales_man',
                                        'manager.full_name as manager',
                                        DB::raw('DATE_FORMAT(projects.created_at,"%d %b %Y") as date')
                                    )
                            //->where('creator.id','=',Auth::user()->id)
                            ->orderBy('projects.created_at')
                            ->get();


        return view('admin.pages.dashboard.main')->with('allprojects',$allprojects);

     }

    public function datatablesDashBoard()
     { 
        return $requestData = Request::all();
     }

   public function deleteProjectPost($proposal_no)
      {
       
     /*  
       DB::table('feature_projects')->where('project_id', '=', $proposal_no)->delete();
       DB::table('project_details')->where('project_id', '=', $proposal_no)->delete();
       DB::table('project_hosting')->where('project_id', '=', $proposal_no)->delete();
       DB::table('project_oppertunities')->where('project_id', '=', $proposal_no)->delete();
       DB::table('project_visual')->where('project_id', '=', $proposal_no)->delete();
       DB::table('project_oppertunities')->where('project_id', '=', $proposal_no)->delete(); */
      
       DB::table('project_codings')->where('id', '=', $proposal_no)->delete();
        //DB::table('projects')->where('id', '=', $proposal_no)->delete();

        
        return Redirect::back()
                    ->withErrors(
                                    [
                                        'msg' => 'Project Successfully Deleted'
                                    ]
                                );
     } 


    public function deleteProject($proposal_no)
      { 
       
       $projects = DB::table('projects')->select('id')->where('proposal_no', '=', $proposal_no)->first();

       DB::table('feature_projects')->where('project_id', '=', $projects->id)->delete();
       DB::table('project_details')->where('project_id', '=', $projects->id)->delete();
       DB::table('project_hosting')->where('project_id', '=', $projects->id)->delete();
       DB::table('project_oppertunities')->where('project_id', '=', $projects->id)->delete();
       DB::table('project_visual')->where('project_id', '=', $projects->id)->delete();
       DB::table('project_oppertunities')->where('project_id', '=', $projects->id)->delete();
       DB::table('projects')->where('id', '=', $projects->id)->delete();
       //DB::table('project_codings')->where('id', '=', $proposal_no)->delete();

        
        return Redirect::back()
                    ->withErrors(
                                    [
                                        'msg' => 'Project Successfully Deleted'
                                    ]
                                );
     }  

    public function searchProject()
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
                                        DB::raw('DATE_FORMAT(projects.created_at,"%d %b %Y") as date')
                                    )
                            ->where('projects.project_title','like','%'.$search_key.'%')
                            ->orderBy('projects.created_at')
                            ->get();

          echo json_encode($serachresult);    
       }
     } 

    public function viewPortfolio($proposal_no)
      { 
        $allportfolio = Portfolio::all();        
        return view('admin.pages.portfolio.main')->with('allportfolio',$allportfolio)
                                                 ->with('proposal_no',$proposal_no);
      }  


    public function viewCodingDashboard()
      {
        $allcoding = ProjectCoding::join('projects','project_codings.project_id','=','projects.id')
                                        ->select('projects.project_title','project_codings.*')
                                        ->get();
         //dd($allcoding);                               
                                   
        return view('admin.pages.coding_dashboard.main')->with('allcoding',$allcoding);
      }  

    public function addProjectCoding()
      {
        
        $all_projects = Project::all();
        return view('admin.pages.coding_dashboard.coding.main',[
                                                                  'all_projects' => $all_projects
                                                                ]); 
      }  

    public function editProjectCoding($id)
      {
         $all_projects = Project::all();
         
         $selected_projects = ProjectCoding::join('projects','project_codings.project_id','=','projects.id')
                                    ->join('project_types','projects.project_type_id','=','project_types.id') 
                                    ->select('projects.project_title','project_types.name','project_codings.*')
                                    ->where('project_codings.id',$id)
                                    ->first();

          $project_feature_pages = Project_feature_page::where('project_id',$selected_projects->project_id)->get();
    
         return view('admin.pages.coding_dashboard.coding.edit_main',[
                                                                      'all_projects' => $all_projects,
                                                                      'selected_projects' => $selected_projects,
                                                                      'project_feature_pages'=>$project_feature_pages
                                                                     ]); 
      }


    public  function addProjectCodingNew($proposal_no)
      { 
         
         $selected_projects = Project::join('project_types','projects.project_type_id','=','project_types.id')                                   
                                      ->select('projects.project_title','projects.id','project_types.name')
                                      ->where('projects.proposal_no',$proposal_no)
                                      ->first();         
     //dd($selected_projects);
         return view('admin.pages.coding_dashboard.coding.edit_main',[                                                                       
                                                                       'selected_projects' => $selected_projects,                                                                      
                                                                     ]);  

      }     

    public function editingProjectCoding($id)
      {
        $requestData = Request::all();
         
           $project_coding = ProjectCoding::find($id);
           //$project_coding->project_id = $requestData['project_id'];  
           $project_coding->project_timeline = $requestData['project_timeline']; 
           $project_coding->invision_lik = $requestData['invision_lik']; 
           $project_coding->invision_password = $requestData['invision_password']; 
           $project_coding->awarded_to = $requestData['awarded_to']; 
           $project_coding->demo_link = $requestData['demo_link']; 
           $project_coding->live_lik = $requestData['live_lik']; 
           $project_coding->other_note = $requestData['other_note']; 
           $project_coding->save();

           return $this->editProjectCoding($id);
           
      }     

    public function searchProjectForCoding()
      {
         $project_id = Input::get('project_id');

         $result_array = array();

        if(strlen($project_id) >= 1 && $project_id !='') { 

          $result_array['project_info'] = Project::join('project_types','projects.project_type_id','=','project_types.id')                                                      
                                                      ->select('project_types.name','projects.id')
                                                      ->where('projects.id',$project_id)
                                                      ->get();
          //echo json_encode($project_info);
        
          $result_array['feture_pages'] = Project_feature_page::where('project_id',$project_id)->get();
          
          echo json_encode($result_array);

         }  
       }

    public function addProjectCodingPost()
      { 
         $requestData = Request::all();
       //dd($requestData);
         $rules = [    
                   'project_id'=>'required',
                   'project_timeline'=>'required', 
                   'invision_lik'=> 'required',
                   'invision_password'=>'required',
                   'awarded_to'=>'required',
                   'demo_link'=>'required',
                   'live_lik'=>'required',
                   'other_note'=>'required' 
                 ];

           $validator=Validator::make(Input::all(),$rules);

           if($validator->fails()){
               return redirect()->back()->withErrors($validator)->withInput();
            }

             $project_coding = new ProjectCoding;
             $project_coding->project_id = $requestData['project_id'];  
             $project_coding->project_timeline = $requestData['project_timeline']; 
             $project_coding->invision_lik = $requestData['invision_lik']; 
             $project_coding->invision_password = $requestData['invision_password']; 
             $project_coding->awarded_to = $requestData['awarded_to']; 
             $project_coding->demo_link = $requestData['demo_link']; 
             $project_coding->live_lik = $requestData['live_lik']; 
             $project_coding->other_note = $requestData['other_note']; 
             $project_coding->save();


            return $this->editingProjectCoding($project_coding->id);

            /* return Redirect::back()
                    ->withErrors(
                                    [
                                        'Successfully Updated Added'
                                    ]
                                );      */   

      } 


}// end class
