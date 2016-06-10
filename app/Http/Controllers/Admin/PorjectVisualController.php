<?php

namespace App\Http\Controllers\Admin;

use Request;
use App\Http\Controllers\Controller;
use App\ProjectType;
use App\User;
use App\Project;
use App\ProjectVisual;
use App\Portfolio;
use App\ProjectPorfolio;
use App\LookFeelFonts;
use App\LookFeelDocuments;
use Auth;
use DB;
use Illuminate\Support\Facades\Redirect;
use Validator;
use Illuminate\Support\Facades\Input;

/*
	Functionality	-> Handel Project Edit
	Access			-> Only Admin
	Created At		-> 10/02/2016
	Created by		-> S. M. Abrar Jahin -> abrarjahin@outlook.com
*/

 error_reporting(0);

class PorjectVisualController extends Controller
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
    public function viewPorjectVisual($proposal_no)
     {
        //return view('admin.pages.porject_visual.main');
         $projects = Project::where('proposal_no', $proposal_no)->first();         
         $projectvisual = ProjectVisual::where('project_id', $projects->id)->first(); 

         $portfolios = ProjectPorfolio::select('portfolio_id')->where('project_id',$projects->id)->get();       
         $portfolios = $portfolios->toArray();
         $selected_portfolio = DB::table('portforlios')->whereIn('id',$portfolios)->get(); 
       
          return view('admin.pages.porject_visual.main',
                                                         [
  														                             'selected_portfolio' => $selected_portfolio,
                                                           'projectvisual'			=> $projectvisual,
  													                               'proposal_no' => $proposal_no
                                                         ]);
     }

    public function addPorjectVisual($proposal_no)
     { 
        $rules=[            
                    'sitemap'=> 'required|not_in:0',
                    'referance_websites'		=> 'required',
                    'referance_similarities'	=> 'required',
                    'preferred_color_1'		    => 'required',
                    'preferred_color_2'         => 'required',
                    'other_notes'	            => 'required'  
               ];

        $validator=Validator::make(Input::all(),$rules);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
           }
     	
             $preffered_fonts = Input::get('preffered_fonts');
            //$related_documents = Input::get('related_documents');            
   
            //Everything OK, So input the Data into DB or Update DB
            //Get Current Project - Start
              $project = Project::firstOrNew(array('proposal_no' => $proposal_no ));           
               

              DB::table('look_feel_fonts')->where('project_id',$project->id)->delete(); 
              for($i=0;$i<sizeof($preffered_fonts);$i++) {                   
                   $fonts = new LookFeelFonts();
                   $fonts->project_id = $project->id;
                   $fonts->preffered_fonts = $preffered_fonts[$i];
                   $fonts->save();
               }
             
                /* if(!empty($related_documents)){ 

                       $path_name  = 'uploads/look_feel_documents/'.$project->id;                               
                   
                    //for($i=0;$i<sizeof($related_documents);$i++)
                   foreach ($related_documents as $file)
                     { 
                        $name = $file->getClientOriginalName();
                        $success = $file->move($path_name,$name);  

                       $lookfeeldocuments = new LookFeelDocuments(); 
                       $lookfeeldocuments->project_id = $project->id;
                       $lookfeeldocuments->related_documents  =  $related_documents[$i];                       
                       $lookfeeldocuments->save(); 
                     } 
             }*/
            //Get Current Project - End

            //Update Project Details - Start
                $projectvisual = ProjectVisual::firstOrNew(array('project_id' => $project->id));


            //Update Project Details - Start
                //$projectvisual  = ProjectVisual();

                $projectvisual->sitemap   = Input::get('sitemap');
                $projectvisual->referance_websites   	= Input::get('referance_websites');
                $projectvisual->referance_similarities  = Input::get('referance_similarities');
                $projectvisual->preferred_color_1   	= Input::get('preferred_color_1');
                $projectvisual->preferred_color_2   	= Input::get('preferred_color_2');
                $projectvisual->other_notes   	= Input::get('other_notes'); 
            

                $projectvisual->save();
           
             $projects = Project::where('proposal_no', $proposal_no)->first();         
             $projectvisual = ProjectVisual::where('project_id', $projects->id)->first();
        
            $portfolios = ProjectPorfolio::select('portfolio_id')->where('project_id',$projects->id)->get();       
            $portfolios = $portfolios->toArray();
            $selected_portfolio = DB::table('portforlios')->whereIn('id',$portfolios)->get(); 

        \Session::flash('msg','Successfully Updated');
       
          return view('admin.pages.porject_visual.main',
                                                         [
                                                            'selected_portfolio' => $selected_portfolio,
                                                            'projectvisual'  => $projectvisual,
                                                            'proposal_no' => $proposal_no
                                                         ]);              

         }

   public function addPorjectPortfolio($proposal_no)
      { 

         $project = Project::where('proposal_no', $proposal_no)->first(); 

         $portfolios = ProjectPorfolio::select('portfolio_id')->where('project_id',$project->id)->get();
       
         $portfolios = $portfolios->toArray();

         $selected_portfolio = DB::table('portforlios')->whereIn('id',$portfolios)->get();  

         $projectvisual = ProjectVisual::where('project_id', $projects->id)->first();

         return view('admin.pages.porject_visual.main',
                                                        [
                                                           'selected_portfolio' => $selected_portfolio,
                                                           'projectvisual'  => $projectvisual,
                                                           'proposal_no' => $proposal_no
                                                        ]);
      } 

                
    public function addPortfolioPorject($proposal_no)    
      {
         /*$portfolio_id = Input::get('portfolio_id');
         $project = Project::where('proposal_no', $proposal_no)->first();

         $project_portfolio = new ProjectPorfolio;
         $project_portfolio->project_id = $project->id;
         $project_portfolio->portfolio_id = $portfolio_id;
         $project_portfolio->save();*/

         $portfolio_id = Input::get('portfolio_id');
         $project = Project::where('proposal_no', $proposal_no)->first();

         $portfolios = ProjectPorfolio::select('portfolio_id')->where('project_id',$project->id)->get();

         if(sizeof($portfolios)<2)
           {
             $project_portfolio = new ProjectPorfolio;
             $project_portfolio->project_id = $project->id;
             $project_portfolio->portfolio_id = $portfolio_id;
             $project_portfolio->save();
           }  
      }  

    public function deletePortfolioPorject($proposal_no)
      {
        $portfolio_id = Input::get('portfolio_id');
        $project = Project::where('proposal_no', $proposal_no)->first();
       
         DB::table('project_portfolios')->where('project_id',$project->id)->where('portfolio_id',$portfolio_id)->delete();
         die();
      }  
                
} // end class
