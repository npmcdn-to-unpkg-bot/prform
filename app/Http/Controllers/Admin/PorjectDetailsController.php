<?php

namespace App\Http\Controllers\Admin;

use Request;
use App\Http\Controllers\Controller;
use App\Industry;
use App\Project;
use App\ProjectDetails;
use App\Project_feature_page;
use Auth;
use Illuminate\Support\Facades\Redirect;
use Validator;

/*
	Functionality	-> Handel All Admin Works
	Access			-> Only Admin
	Created At		-> 09/02/2016
	Created by		-> S. M. Abrar Jahin -> abrarjahin@outlook.com
*/

class PorjectDetailsController extends Controller
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
        URL             -> get : /project_opportunity/{proposal_no}
        Functionality   -> Project Oppertunity
        Access          -> Only Admin
        Created At      -> 09/02/2016
        Updated At      -> 09/02/2016
        Created by      -> S. M. Abrar Jahin -> abrarjahin@outlook.com
    */
    public function detailsProject($proposal_no)
    {
    	$project = Project::select(
                                        'id',
                                        'project_type_id'
                                    )
                            ->where('creator_id', Auth::user()->id)
                            ->where('proposal_no', $proposal_no)
                            ->firstOrFail();

		//Previous value for editing - Start
		$project_details = ProjectDetails::where('project_id', $project->id)
								->first();

        $project_features  = Project_feature_page::where('project_id', $project->id)->get();

		//Previous value for editing - End

		$industries	= Industry::orderBy('name', 'asc')->get();
							

        return view('admin.pages.porject_details.main', [
															'current_project'		=> $project,
															'project_details'		=> $project_details,
															'industries'			=> $industries,
														    'project_features'      => $project_features
                                                        ]);  
    }

    /*
        URL             -> post : /project_opportunity/{proposal_no}
        Functionality   -> Project Oppertunity Process
        Access          -> Only Admin
        Created At      -> 09/02/2016
        Updated At      -> 09/02/2016
        Created by      -> S. M. Abrar Jahin
    */
    public function detailsProjectPost($proposal_no)
     {
    	
        $requestData = Request::all();

        $validator = Validator::make(
                                        $requestData,
                                        [
                                            'industry_id'					=> 'required|not_in:0',
                                            'business_description'			=> 'required|not_in:0',
                                            'sales_cahnnel'					=> 'required|in:"B2B","B2C"',
                                            'product_details'           	=> 'required',
                                            'terget_audience_description'	=> 'required',
                                            'competitor_list'				=> 'required',
                                            'unique_selling_points'			=> 'required',
                                            'other_notes'					=> 'required'
                                        ],
                                        [
											'industry_id.not_in'			=>'Please Select a INDUSTRY'
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
            //Get Current Project - Start
                $project                    = Project::firstOrNew(array('proposal_no' => $proposal_no ));
            //Get Current Project - End

            //Update Project Details - Start
                $project_details                	= ProjectDetails::firstOrNew(array('project_id' => $project->id ));

                $project_details->industry_id   	= $requestData['industry_id'];
                $project_details->business_description   	= $requestData['business_description'];
                $project_details->sales_cahnnel   	= $requestData['sales_cahnnel'];
                $project_details->product_details   	= $requestData['product_details'];
                $project_details->terget_audience_description   	= $requestData['terget_audience_description'];
                $project_details->competitor_list   	= $requestData['competitor_list'];
                $project_details->unique_selling_points   	= $requestData['unique_selling_points'];
                $project_details->other_notes   	= $requestData['other_notes'];

                $project_details->save(); // End Save to project details table

                //now start to save project_fetcure_pagrs table
              // sizeof($requestData['page_name'];)


                 $count = sizeof($requestData['page_name']); 



                if(isset($requestData['feuture_auto_id']))
                  { 
                    for($i=0;$i<$count;$i++)
                       { 
                         $project_fetcure_pagrs = Project_feature_page::find($requestData['feuture_auto_id'][$i]);
                         //$project_fetcure_pagrs->project_id = $project->id;
                         $project_fetcure_pagrs->page_name = $requestData['page_name'][$i];
                         $project_fetcure_pagrs->page_requirements = $requestData['page_requirements'][$i];
                         $project_fetcure_pagrs->extra_notes = $requestData['extra_notes'][$i];
                         $project_fetcure_pagrs->save();
                       }  
                   } 
                else {
                      for($i=0;$i<$count;$i++)
                        {
                            $project_fetcure_pagrs = new Project_feature_page();
                            $project_fetcure_pagrs->project_id = $project->id;
                            $project_fetcure_pagrs->page_name = $requestData['page_name'][$i];
                            $project_fetcure_pagrs->page_requirements = $requestData['page_requirements'][$i];
                            $project_fetcure_pagrs->extra_notes = $requestData['extra_notes'][$i];
                            $project_fetcure_pagrs->save();
                        }    
                     }       


            //Update Project Type - End

            /*//Update Project Feature - Start
                //Delete Previous Entries - Start
                    FeatureProject::where('project_id', '=', $project->id)->delete();
                //Delete Previous Entries - END

                //Add New Data - Start
                    FeatureProject::InsertData($project->id,$requestData['feature_id']);
                //Add New Data - END
            //Update Project Feature - End*/

        //Update or insert done


        return Redirect::back()
                    ->withErrors(
                                    [
                                        'Project - "'.$proposal_no.'" Successfully Updated'
                                    ]
                                );
    }
}
