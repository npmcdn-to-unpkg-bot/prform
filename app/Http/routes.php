<?php

// Auth Routes
Route::group(array('prefix' => '/','middleware' => 'web','as' => 'auth'), function()
{
	//Login Routes
	Route::get('/', [
		'uses'			=> 'LoginController@userLoginView',
		'middleware'	=> 'before_loggedin',
		'as'			=> 'login.view'
		]);

	Route::get('login', [
		'uses' 			=> 'LoginController@userLoginView',
		'middleware'	=> 'before_loggedin',
		'as' 			=> 'login.view'
		]);

	Route::post('login', [
			'uses' => 'LoginController@userLoginProcess',
			'as' => 'login.process'
		]);

	//Register Routes
	Route::get('register', [
			'uses' => 'LoginController@UserRegisterView',
			//'middleware' => 'admin',
			'as' => 'register.view'
		]);

	Route::post('register', [
			'uses' => 'LoginController@userRegisterProcess',
			'as' => 'register.process'
		]);

	Route::get('logout', [
			'uses' => 'LoginController@userLogout',
			'as' => 'logout'
		]);
	//Login Routes
	Route::get('project_not_registered', function()
	{
	    return view('user.not_found');
	});

	//for super admin
    Route::get('cms', [
			'uses' => 'SuperadminController@CMS',
			'as' => 'CMS'
		]);
	
	//for super admin viewSlaersPerson

	//view user
    Route::get('view_users', [
			'uses' => 'SuperadminController@viewUsers',
			'as' => 'viewUsers'
		]);
    //end view user

    //view user
    Route::post('create_new_user', [ 
			'uses' => 'SuperadminController@createNewUser',
			'as' => 'createNewUser'
		]);
    //end view user
    //update user
    Route::get('update_user/{id}', [
			'uses' => 'SuperadminController@updateUser',
			'as' => 'updateUser'
		]);

    //end update user
    //updating user
    Route::post('updating_user/{id}', [
			'uses' => 'SuperadminController@updatingUser',
			'as' => 'updatingUser'
		]);
    //end updating user    
    
        //updating user
    Route::get('delete_user/{id}', [
			'uses' => 'SuperadminController@deleteUser',
			'as' => 'deleteUser'
		]);
    //end updating user

     Route::get('/view_project_platform',[ 
			'uses' => 'SuperadminController@viewProjectPlatform',
			'as' => 'viewProjectPlatform'
		]);

     Route::post('/create_platform',[
			'uses' => 'SuperadminController@addProjectPlatform',
			'as' => 'addProjectPlatform'
		]);

     Route::get('/edit_project_platform/{id}',[  
			'uses' => 'SuperadminController@editProjectPlatform',
			'as' => 'editProjectPlatform'
		]);

	 Route::post('/editing_project_platform/{id}',[ 
			'uses' => 'SuperadminController@editingProjectPlatform',
			'as' => 'editingProjectPlatform'
		]);

     Route::get('delete_project_platform/{id}', [
		'uses' => 'SuperadminController@deleteProjectPlatform',
		'as' => 'deleteProjectPlatform'
	   ]);

    Route::get('/view_portfolio',[
    	'uses' => 'SuperadminController@ViewPortfolio',
    	'as' => 'ViewPortfolio']);    

    Route::post('/create_portfolio',[ 
    	'uses' => 'SuperadminController@createPortfolio',
    	'as' => 'createPortfolio']);      

    Route::get('edit_portfolio/{id}', [
			'uses' => 'SuperadminController@editPortfolio',
			'as' => 'admin.editPortfolio'
			]);	
    Route::post('editing_portfolio/{id}', [
			'uses' => 'SuperadminController@editingPortfolio',
			'as' => 'admin.editingPortfolio'
			]);	

    Route::get('/delete_portfolio/{id}',[
    	    'uses' => 'SuperadminController@deletePortfolio',
			'as' => 'admin.deletePortfolio' 
			]);	

    Route::get('/view_look_feel',[
    	    'uses' => 'SuperadminController@viewLookFeel',
			'as' => 'viewLookFeel'
			]);	

    Route::get('/edit_look_feel/{id}',[
    	    'uses' => 'SuperadminController@EditLookFeel',
			'as' => 'EditLookFeel'
			]);	

     Route::post('/editing_look_feel/{id}',[
    	    'uses' => 'SuperadminController@EditingLookFeel',
			'as' => 'EditingLookFeel'
			]);	

  });
//Admin Routes
Route::group(array('prefix' => '/','namespace' => 'Admin','middleware' => 'web','as' => 'admin'), function()
{
	//Project DashBoard - Start
		Route::get('dashboard', [
			'uses' => 'DashBoardController@viewDashBoard',
			'as' => 'admin.viewDashBoard'
			]);
		Route::post('dashboard', [
			'uses' => 'DashBoardController@datatablesDashBoard',
			'as' => 'admin.viewDashBoard'
			]);
	//Project DashBoard - END

    //Back Dashboard
		Route::get('back_dashboard/{proposal_no}', [
			'uses' => 'AdminController@backDashboard',
			'as' => 'admin.backDashboard'
			]);		
    //end Back Dashboard		

	//Adding New Project - Start
		Route::get('add_new_project', [
			'uses' => 'AdminController@showAddProject',
			'as' => 'admin.add_project_show'
			]);

		Route::post('add_new_project', [
			'uses' => 'AdminController@addProjectPost',
			'as' => 'admin.addProjectPost'
			]);
	//Adding New Project - END
    //Related Projects Documents 
	    Route::post('add_related_documents/{proposal_no}', [
	       'uses' => 'AdminController@addRelatedDocumentsPost',
	       'as' => 'admin.addRelatedDocumentsPost'
	       ]);
	//End Projects Documents	
	//Project Edit - Start
		
              Route::get('porject_edit/{proposal_no}', [
			'uses' => 'PorjectEditController@editProject',
			'as' => 'admin.editProject'
			]);

		Route::post('porject_edit/{proposal_no}', [
			'uses' => 'PorjectEditController@editProjectPost',
			'as' => 'admin.editProjectPost'
			]);
	//Project Edit - END	
    //Project delete
		Route::get('porject_delete/{proposal_no}', [
			'uses' => 'DashBoardController@deleteProjectPost',
			'as' => 'admin.deleteProjectPost'
			]);
	//Project Edit - END	

	     Route::get('delete_porject/{proposal_no}', [
			'uses' => 'DashBoardController@deleteProject',
			'as' => 'admin.deleteProjectPost'
			]);
    
     //Project delete
		Route::post('porject_search', [
			'uses' => 'DashBoardController@searchProject',
			'as' => 'admin.searchProject'
			]);
	//Project Edit - END

	//Project Opportunity - Start
		Route::get('project_opportunity/{proposal_no}', [
			'uses' => 'AdminController@opportunityProject',
			'as' => 'admin.opportunityProject'
			]);

		Route::post('project_opportunity/{proposal_no}', [
			'uses' => 'AdminController@opportunityProjectPost',
			'as' => 'admin.opportunityProjectPost'
			]);
	//Project Opportunity - END

    //Project Porposal Approve - Start
		Route::post('approve_proposal', [
			'uses' => 'AdminController@approveProjectProposal',
			'as' => 'admin.approveProjectProposal'
			]);
	//Project Opportunity - END		

	//Project Details - Start
		Route::get('porject_details/{proposal_no}', [
			'uses' => 'PorjectDetailsController@detailsProject',
			'as' => 'admin.detailsProject'
			]);

		Route::post('porject_details/{proposal_no}', [
			'uses' => 'PorjectDetailsController@detailsProjectPost',
			'as' => 'admin.detailsProjectPost'
			]);
	//Project Details - END

	//Look and Feel - Start
		Route::get('porject_visual/{proposal_no}', [
			'uses' => 'PorjectVisualController@viewPorjectVisual',
			'as' => 'admin.viewDashBoard'
			]);

		Route::post('add_porject_visual/{proposal_no}', [
			'uses' => 'PorjectVisualController@addPorjectVisual',
			'as' => 'admin.addPorjectVisual'
			]);

	        Route::get('porject_visual_back/{proposal_no}', [
			'uses' => 'PorjectVisualController@addPorjectPortfolio',
			'as' => 'admin.addPorjectPortfolio'
			]);
	
                Route::post('add_portfolio_look_fell/{proposal_no}', [
			'uses' => 'PorjectVisualController@addPortfolioPorject',
			'as' => 'admin.addPortfolioPorject'
			]);	 

	    Route::post('delete_portfolio_look_fell/{proposal_no}', [
			'uses' => 'PorjectVisualController@deletePortfolioPorject',
			'as' => 'admin.deletePortfolioPorject'
			]);	 
	//Look and Feel - END

	//Project Costing - Start
		Route::get('porject_costing/{proposal_no}', [
			'uses' => 'PorjectCostingController@viewPorjectCosting',
			'as' => 'admin.viewProjectCosting'
			]);

	//Project Costing - END

	//Project Hosting - Start
		Route::get('porject_hosting/{proposal_no}', [
			'uses' => 'PorjectHostingController@viewPorjectHosting',
			'as' => 'admin.viewProjectCosting'
			]);

		Route::post('porject_hosting/{proposal_no}', [
			'uses' => 'PorjectHostingController@porjectHostingPost',
			'as' => 'admin.porjectHostingPost'
			]);
	//Project Hosting - END

	//portfolio - Start portfolio
		Route::get('portfolio/{proposal_no}', [
			'uses' => 'DashBoardController@viewPortfolio',
			'as' => 'admin.viewPortfolio'
			]);
	   
	//portfolio - END 

   //start cost
		Route::post('edit_cost/{proposal_no}', [
			'uses' => 'DashBoardController@editCost',
			'as' => 'admin.editCost'
			]);	   
	    Route::post('porject_costing/{proposal_no}', [
			'uses' => 'PorjectCostingController@editCost',
			'as' => 'admin.editCost'
			]);	
   //end cost	
   //start coding Dashboard
		Route::get('coding_dashboard', [
			'uses' => 'DashBoardController@viewCodingDashboard',
			'as' => 'admin.viewCodingDashboard'
			]);	   
	//end coding Dashboard  

     //start coding Dashboard
		Route::get('add_project_coding', [
			'uses' => 'DashBoardController@addProjectCoding',
			'as' => 'admin.addProjectCoding'
			]);	   
	 //end coding Dashboard
     //start coding Dashboard 
		Route::post('add_project_coding', [
			'uses' => 'DashBoardController@addProjectCodingPost',
			'as' => 'admin.addProjectCodingPost'
			]);	   
	//end coding Dashboard 

	//start coding add project coding from edit project page
		Route::get('add_project_coding_new/{proposal_no}', [
			'uses' => 'DashBoardController@addProjectCodingNew',
			'as' => 'admin.addProjectCodingNew'
			]);	
	    Route::post('add_project_coding_new/{proposal_no}', [
			'uses' => 'DashBoardController@addProjectCodingPost',
			'as' => 'admin.addProjectCodingNew'
			]);	 		   
	//end coding Dashboard 			
    
    //start coding Dashboard
		Route::get('edit_project_coding/{id}', [
			'uses' => 'DashBoardController@editProjectCoding',
			'as' => 'admin.editProjectCoding'
			]);	   
	    Route::post('edit_project_coding/{id}', [
			'uses' => 'DashBoardController@editingProjectCoding',
			'as' => 'admin.editProjectCoding'
			]);		
	 //end coding Dashboard	

    //start porject Search
		Route::post('/search_project',[
			'uses' => 'DashBoardController@searchProjectForCoding',
			 'as' =>  'admin.searchProjectForCoding'
			 ]);
    //end porject Search  

    //start related documents delete
		Route::post('/delete_related_documents',[
			'uses' => 'AdminController@deleteRelatedDocuments',
			 'as' =>  'admin.deleteRelatedDocuments'
			 ]);
    //end related documents delete
	
});

//User Routes
Route::group(array('prefix' => '/','namespace' => 'User','middleware' => 'web','as' => 'user'), function()
{
	Route::get('active', [
		'uses' => 'UserController@showAvailableWorks',
		'as' => 'user.available_works'
		]);

	Route::get('user_dashboard', [
		'uses' => 'UserController@viewUserDashBoard',
		'as' => 'user.viewUserDashBoard'
		]);

	//Adding New Project - Start
/*	Route::get('add_new_project', [
		'uses' => 'UserController@showAddProject',
		'as' => 'user.add_project_show'
		]);

	Route::post('add_new_project', [
		'uses' => 'UserController@addProjectPost',
		'as' => 'user.addProjectPost'
		]);*/
	//Adding New Project - END 

    
	//Adding New Project - Start
/*	Route::get('add_project_quotation', [
		'uses' => 'UserController@AddProjectQuotation',
		'as' => 'user.AddProjectQuotation'
		]);

	Route::post('add_project_quote', [
		'uses' => 'UserController@addProjectPost',
		'as' => 'user.addProjectPost'
		]);*/
	//Adding New Project - END

	//Adding New Project - Start
	Route::get('add_project_quotation', [
		'uses' => 'UserController@AddProjectQuotation',
		'as' => 'user.AddProjectQuotation'
		]);

	Route::post('add_project_quotation', [
		'uses' => 'UserController@AddProjectQuotationPost',
		'as' => 'user.AddProjectQuotationPost'
		]);

	Route::post('add_new_project', [
		'uses' => 'UserController@addProjectPost',
		'as' => 'user.addProjectPost'
		]);
	//Adding New Project - END

    //view projet
	Route::get('view_porject/{proposal_no}', [
	'uses' => 'UserController@viewProject',
	'as' => 'user.viewProject'
	]); 
    //end view project	 user_porject_search

  //Project delete
	Route::post('user_porject_search', [
		'uses' => 'UserController@searchUserProject',
		'as' => 'user.searchUserProject'
		]);
	//Project Edit - END

  
    //start porject Search for quotation
	Route::post('/search_project_for_quotation',[
		'uses' => 'UserController@searchProjectForQuotation',
		 'as' =>  'user.searchProjectForQuotation'
		 ]);
    //end porject Search for quotation	

});

