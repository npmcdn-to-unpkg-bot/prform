<?php 

namespace App\Http\Controllers\Admin;

use Request;
use App\Http\Controllers\Controller;
use App\ProjectType;
use App\User;
use App\Project;
use App\ProjectDetails;
use App\Project_feature_page;
use App\ProjectCostBreakdown;
use App\ProjectCostSubcategory;
use Auth;
use DB;
use Illuminate\Support\Facades\Redirect;
use Validator;

/*
	Functionality	-> Handel Project Edit
	Access			-> Only Admin
	Created At		-> 10/02/2016
	Created by		-> S. M. Abrar Jahin -> abrarjahin@outlook.com
*/
error_reporting(0);
class PorjectCostingController extends Controller
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
    public function viewPorjectCosting($proposal_no)
     { 
        $project_type = Project::join('project_types','projects.project_type_id','=','project_types.id')
                                            ->select('project_types.name')
                                            ->where('projects.proposal_no',$proposal_no) 
                                            ->first();

        $project_pages = Project_feature_page::join('projects','project_feature_pages.project_id','=','projects.id')
                                                ->select('project_feature_pages.*')
                                                ->where('projects.proposal_no',$proposal_no)   
                                                ->get();                               

      
        
       $project_module = Project::join('project_cost_breakdowns','projects.id','=','project_cost_breakdowns.project_id')
                                        ->select('project_cost_breakdowns.*')
                                        ->where('projects.proposal_no',$proposal_no) 
                                        ->get();

     
       
        $project_module_cost = Project::join('project_cost_breakdowns','projects.id','=','project_cost_breakdowns.project_id')
                                        ->select(DB::raw('SUM(project_cost_breakdowns.estimated_cost) as e_cost,SUM(project_cost_breakdowns.actual_cost) as a_cost,SUM(project_cost_breakdowns.quoted_cost) as q_cost')) 
                                        ->where('projects.proposal_no',$proposal_no)
                                        ->groupBy('projects.id')                                         
                                        ->get();     

       $project_module_sub = ProjectCostBreakdown::join('project_cost_subcategories','project_cost_breakdowns.id','=','project_cost_subcategories.category_id')
                                        ->join('projects','project_cost_breakdowns.project_id','=','projects.id')
                                        ->select(DB::raw('SUM(project_cost_subcategories.sub_estimated_cost) as e_cost,SUM(project_cost_subcategories.sub_actual_cost) as a_cost,SUM(project_cost_subcategories.sub_quoted_cost) as q_cost')) 
                                        ->where('projects.proposal_no',$proposal_no)
                                        ->groupBy('projects.id')                                         
                                        ->get();     
                                                                                                     
       //$project_module_sub1 = $project_module_sub->toArray();
     
   //dd( $project_module_sub1);

    $new_project_module_cost =  array();
    foreach ($project_module_cost as $module) {
    	$new_project_module_cost[] = $module->e_cost;
    	$new_project_module_cost[] = $module->a_cost;
    	$new_project_module_cost[] = $module->q_cost;
    }                                      
 
    $new_project_module_sub =  array();
    foreach ($project_module_sub as $module_sub) {
    	$new_project_module_sub[] = $module_sub->e_cost;
    	$new_project_module_sub[] = $module_sub->a_cost;
    	$new_project_module_sub[] = $module_sub->q_cost;
    }

 
 $total_cost = array();
 for($i=0;$i<sizeof($new_project_module_sub);$i++)
   { 
   	 $total_cost[] = $new_project_module_cost[$i] + $new_project_module_sub[$i];
   }


    return view('admin.pages.porject_costing.main',[ 
    	                                               'project_type' => $project_type,
    	                                               'project_pages' => $project_pages,
    	                                               'project_module'  => $project_module,
    	                                               'total_cost'  => $total_cost
        	                                       ]);

       /* return view('admin.pages.porject_costing.main',[ 
        	                                               'project_type' => $project_type,
        	                                               'project_pages' => $project_pages,
        	                                               'project_module'  => $project_module
        	                                           ]);
      */
   

     }


    public function editCost($proposal_no)
      {  
        $requestData = Request::all();        

       /* $validator = Validator::make(
                                        $requestData,
                                        [
                                            'design_module_name'	       => 'required',
                                            'design_estimated_cost'	       => 'required',
                                            'design_actual_cost'	       => 'required',
                                            'design_quoted_cost'	       => 'required',
                                            'development_module_name'	   => 'required',
                                            'development_estimated_cost'   => 'required',
                                            'development_actual_cost'	   => 'required',
                                            'development_quoted_cost'	   => 'required',
                                            'mobile_module_name'	       => 'required',
                                            'mobile_estimated_cost'	       => 'required',
                                            'mobile_actual_cost'		   => 'required',
                                            'mobile_quoted_cost'		   => 'required',
                                            'hosting_module_name'		   => 'required',
                                            'hosting_estimated_cost'	   => 'required',
                                            'hosting_actual_cost'		   => 'required',
                                            'hosting_quoted_cost'	       => 'required',
                                            'domain_module_name'		   => 'required',
                                            'domain_estimated_cost'		   => 'required'
                                            'domain_actual_cost'		   => 'required',
                                            'domain_quoted_cost'		   => 'required',
                                            'plugins_module_name'		   => 'required',
                                            'plugins_estimated_cost'	   => 'required',
                                            'plugins_actual_cost'		   => 'required',
                                            'plugins_quoted_cost'	       => 'required',
                                            'customize_module_name'		   => 'required',
                                            'customize_estimated_cost'	   => 'required',
                                            'customize_actual_cost'		   => 'required',
                                            'customize_quoted_cost'		   => 'required'
                                        ]                                        
                                    );

        //Validator Failed
        if ($validator->fails())
        {
            return Redirect::back()
            				->withErrors($validator)
                            ->withInput();
        }
*/
       //for design 

        $project = Project::where('proposal_no', $proposal_no)->first();

        $delete = DB::table('project_cost_breakdowns')->where('project_id',$project->id)->delete();
       
        $projectcostbreakdown = new ProjectCostBreakdown;
        $projectcostbreakdown->project_id = $project->id;
        $projectcostbreakdown->module_name = $requestData['design_module_name'];
        $projectcostbreakdown->estimated_cost = $requestData['design_estimated_cost'];
        $projectcostbreakdown->actual_cost = $requestData['design_actual_cost'];
        $projectcostbreakdown->quoted_cost = $requestData['design_quoted_cost'];
        $projectcostbreakdown->save();

        $projectcostbreakdown = $projectcostbreakdown->id;

        for($i=0;$i<sizeof($requestData['design_sub_category_name']);$i++)
          {
            $designSubcategory = new ProjectCostSubcategory;
	        $designSubcategory->category_id = $projectcostbreakdown;
	        $designSubcategory->sub_category_name = $requestData['design_sub_category_name'][$i];
	        $designSubcategory->sub_estimated_cost = $requestData['design_sub_estimated_cos'][$i];
	        $designSubcategory->sub_actual_cost = $requestData['design_sub_actual_cost'][$i];
	        $designSubcategory->sub_quoted_cost = $requestData['design_sub_quoted_cos'][$i];
	        $designSubcategory->save(); 
          }	

    // for development
            $developmentcostbreakdown = new ProjectCostBreakdown;
	        $developmentcostbreakdown->project_id = $project->id;
	        $developmentcostbreakdown->module_name = $requestData['development_module_name'];
	        $developmentcostbreakdown->estimated_cost = $requestData['development_estimated_cost'];
	        $developmentcostbreakdown->actual_cost = $requestData['development_actual_cost'];
	        $developmentcostbreakdown->quoted_cost = $requestData['development_quoted_cost'];
	        $developmentcostbreakdown->save();

	        $development_auto_increment = $developmentcostbreakdown->id;
	       

	        for($t=0;$t<sizeof($requestData['development_sub_category_name']);$t++)
	          {  //echo "dfgdfg"; die();
	            $developmentSubcategory = new ProjectCostSubcategory;
		        $developmentSubcategory->category_id = $development_auto_increment;
		        $developmentSubcategory->sub_category_name = $requestData['development_sub_category_name'][$t];
		        $developmentSubcategory->sub_estimated_cost = $requestData['development_sub_estimated_cos'][$t];
		        $developmentSubcategory->sub_actual_cost = $requestData['development_sub_actual_cost'][$t];
		        $developmentSubcategory->sub_quoted_cost = $requestData['development_sub_quoted_cos'][$t];
		        $developmentSubcategory->save(); 
	          }	

	       // for mobile
            $mobilecostbreakdown = new ProjectCostBreakdown;
	        $mobilecostbreakdown->project_id = $project->id;
	        $mobilecostbreakdown->module_name = $requestData['mobile_module_name'];
	        $mobilecostbreakdown->estimated_cost = $requestData['mobile_estimated_cost'];
	        $mobilecostbreakdown->actual_cost = $requestData['mobile_actual_cost'];
	        $mobilecostbreakdown->quoted_cost = $requestData['mobile_quoted_cost'];
	        $mobilecostbreakdown->save();

	            $mobile_auto_increment = $mobilecostbreakdown->id;

	        for($p=0;$p<sizeof($requestData['mobile_sub_category_name']);$p++)
	          {
	            $mobileSubcategory = new ProjectCostSubcategory;
		        $mobileSubcategory->category_id = $mobile_auto_increment;
		        $mobileSubcategory->sub_category_name = $requestData['mobile_sub_category_name'][$p];
		        $mobileSubcategory->sub_estimated_cost = $requestData['mobile_sub_estimated_cos'][$p];
		        $mobileSubcategory->sub_actual_cost = $requestData['mobile_sub_actual_cost'][$p];
		        $mobileSubcategory->sub_quoted_cost = $requestData['mobile_sub_quoted_cos'][$p];
		        $mobileSubcategory->save(); 
	          }	

	        // for hosting
            $hostingcostbreakdown = new ProjectCostBreakdown;
	        $hostingcostbreakdown->project_id = $project->id;
	        $hostingcostbreakdown->module_name = $requestData['hosting_module_name'];
	        $hostingcostbreakdown->estimated_cost = $requestData['hosting_estimated_cost'];
	        $hostingcostbreakdown->actual_cost = $requestData['hosting_actual_cost'];
	        $hostingcostbreakdown->quoted_cost = $requestData['hosting_quoted_cost'];
	        $hostingcostbreakdown->save();

	          $hosting_auto_increment = $hostingcostbreakdown->id;

	        for($n=0;$n<sizeof($requestData['hosting_sub_category_name']);$n++)
	          {
	            $hostingSubcategory = new ProjectCostSubcategory;
		        $hostingSubcategory->category_id = $hosting_auto_increment;
		        $hostingSubcategory->sub_category_name = $requestData['hosting_sub_category_name'][$n];
		        $hostingSubcategory->sub_estimated_cost = $requestData['hosting_sub_estimated_cos'][$n];
		        $hostingSubcategory->sub_actual_cost = $requestData['hosting_sub_actual_cost'][$n];
		        $hostingSubcategory->sub_quoted_cost = $requestData['hosting_sub_quoted_cos'][$n];
		        $hostingSubcategory->save(); 
	          }	

	        // for domain
            $hdomaincostbreakdown = new ProjectCostBreakdown;
	        $hdomaincostbreakdown->project_id = $project->id;
	        $hdomaincostbreakdown->module_name = $requestData['domain_module_name'];
	        $hdomaincostbreakdown->estimated_cost = $requestData['domain_estimated_cost'];
	        $hdomaincostbreakdown->actual_cost = $requestData['domain_actual_cost'];
	        $hdomaincostbreakdown->quoted_cost = $requestData['domain_quoted_cost'];
	        $hdomaincostbreakdown->save();

	         $domain_auto_increment = $hdomaincostbreakdown->id;

	        for($m=0;$m<sizeof($requestData['domain_sub_category_name']);$m++)
	          {
	            $domainSubcategory = new ProjectCostSubcategory;
		        $domainSubcategory->category_id = $domain_auto_increment;
		        $domainSubcategory->sub_category_name = $requestData['domain_sub_category_name'][$m];
		        $domainSubcategory->sub_estimated_cost = $requestData['domain_sub_estimated_cos'][$m];
		        $domainSubcategory->sub_actual_cost = $requestData['domain_sub_actual_cost'][$m];
		        $domainSubcategory->sub_quoted_cost = $requestData['domain_sub_quoted_cos'][$m];
		        $domainSubcategory->save(); 
	          }	



	    //for plugins        
       
        $pluginscostbreakdown = new ProjectCostBreakdown;
        $pluginscostbreakdown->project_id = $project->id;
        $pluginscostbreakdown->module_name = $requestData['plugins_module_name'];
        $pluginscostbreakdown->estimated_cost = $requestData['plugins_estimated_cost'];
        $pluginscostbreakdown->actual_cost = $requestData['plugins_actual_cost'];
        $pluginscostbreakdown->quoted_cost = $requestData['plugins_quoted_cost'];
        $pluginscostbreakdown->save();

        $plugins_auto_increment = $pluginscostbreakdown->id;

        for($l=0;$l<sizeof($requestData['plugins_sub_category_name']);$l++)
          {
            $pluginsSubcategory = new ProjectCostSubcategory;
	        $pluginsSubcategory->category_id = $plugins_auto_increment;
	        $pluginsSubcategory->sub_category_name = $requestData['plugins_sub_category_name'][$l];
	        $pluginsSubcategory->sub_estimated_cost = $requestData['plugins_sub_estimated_cos'][$l];
	        $pluginsSubcategory->sub_actual_cost = $requestData['plugins_sub_actual_cost'][$l];
	        $pluginsSubcategory->sub_quoted_cost = $requestData['plugins_sub_quoted_cos'][$l];
	        $pluginsSubcategory->save(); 
          }	

           // for feature customize 
            $featurecostbreakdown = new ProjectCostBreakdown;
	        $featurecostbreakdown->project_id = $project->id;
	        $featurecostbreakdown->module_name = $requestData['customize_module_name'];
	        $featurecostbreakdown->estimated_cost = $requestData['customize_estimated_cost'];
	        $featurecostbreakdown->actual_cost = $requestData['customize_actual_cost'];
	        $featurecostbreakdown->quoted_cost = $requestData['customize_quoted_cost'];
	        $featurecostbreakdown->save();


	         $feature_auto_increment = $featurecostbreakdown->id;

	        for($j=0;$j<sizeof($requestData['customize_sub_category_name']);$j++)
	          {
	            $featureSubcategory = new ProjectCostSubcategory;
		        $featureSubcategory->category_id = $feature_auto_increment;
		        $featureSubcategory->sub_category_name = $requestData['customize_sub_category_name'][$j];
		        $featureSubcategory->sub_estimated_cost = $requestData['customize_sub_estimated_cos'][$j];
		        $featureSubcategory->sub_actual_cost = $requestData['customize_sub_actual_cost'][$j];
		        $featureSubcategory->sub_quoted_cost = $requestData['customize_sub_quoted_cos'][$j];
		        $featureSubcategory->save(); 
	          }	

       \Session::flash('msg','Successfully Updated');
        return Redirect::back();
       
      }  


}//end class
