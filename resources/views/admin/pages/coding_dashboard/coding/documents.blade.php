<section class="section project-document">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <h2 class="pdoc-heading lighter text-uppercase">Project DOCUMENTS</h2>
            </div>
            <div class="col-sm-4 text-right">
                <button class="btn btn-black btn-has-icon bold text-uppercase">
                    <span class="bicon"><img src="{{ URL::asset('images/download.png') }}"></span>
                    <span class="btext">Download As PDF</span>
                </button>
            </div>
        </div>

        <ul class="list-unstyled pdoc-panel-list clearfix">
            <li>
                <div class="pdoc-panel text-center">
                    <div class="pdoc-icon">
                        <img src="{{ URL::asset('images/icon/1.png') }}" alt="Project Opportunity">
                    </div>
                    <h4 class="pdoc-title">Project <br>Opportunity</h4>
					<a href="@if( isset($proposal_no) && !empty($proposal_no) )
								    {{ URL::to('project_opportunity/'.$proposal_no) }}
								@else
								{{ URL::to('project_not_registered') }}
								@endif"> 
                    <?php
                    if(isset($proposal_no))
                     { 
                     $project_oppertunities = DB::table('projects')->join('project_oppertunities','projects.id','=','project_oppertunities.project_id')
                                                              ->select('projects.proposal_no')
                                                              ->where('projects.proposal_no',$proposal_no)
                                                              ->get();
                     //if(isset($projects_details) && sizeof($projects_details)==1)
                     }  
                   ?>                                   

                       @if(isset($proposal_no) && !empty($proposal_no) && sizeof($project_oppertunities)==1) 
                                            
						<button class="btn btn-orange btn-block uppercase">VIEW DETAILS</button>
                     @else
                        <button class="btn btn-orange no-content btn-block uppercase">ENTER DETAILS</button>
                     @endif 
					</a>
                </div>
            </li>
            <li>
                <div class="pdoc-panel text-center">
                    <div class="pdoc-icon">
                        <img src="{{ URL::asset('images/icon/2.png') }}" alt="Project Opportunity">
                    </div>
                    <h4 class="pdoc-title">Project<br>Details</h4>
                    <a href="@if( isset($proposal_no) && !empty($proposal_no) )
								    {{ URL::to('porject_details/'.$proposal_no) }}
								@else
								{{ URL::to('project_not_registered') }}
								@endif"> 
                 <?php
                   if(isset($proposal_no))
                     { 
                     $projects_details = DB::table('projects')->join('project_details','projects.id','=','project_details.project_id')
                                                              ->select('projects.proposal_no')
                                                              ->where('projects.proposal_no',$proposal_no)
                                                              ->get();
                     //if(isset($projects_details) && sizeof($projects_details)==1)
                    } 
                   ?>                                   

                       @if(isset($proposal_no) && !empty($proposal_no) && sizeof($projects_details)==1)                            
                        <button class="btn btn-blue btn-block uppercase">VIEW DETAILS</button>
                       @else
                        <button class="btn btn-blue no-content btn-block uppercase">ENTER DETAILS</button>
                       @endif 
                    </a>
                </div>
            </li>
            <li>
                <div class="pdoc-panel text-center">
                    <div class="pdoc-icon">
                        <img src="{{ URL::asset('images/icon/3.png') }}" alt="Project Opportunity">
                    </div>
                    <h4 class="pdoc-title">Look and <br>Feel</h4>
                                        <a href="@if( isset($proposal_no) && !empty($proposal_no) )
                    								    {{ URL::to('porject_visual/'.$proposal_no) }}
                    								@else
                    								{{ URL::to('project_not_registered') }}
                    								@endif">  
                    <?php
                     if(isset($proposal_no))
                     { 
                       $projects_vusual = DB::table('projects')->join('project_visual','projects.id','=','project_visual.project_id')
                                                              ->select('projects.proposal_no')
                                                              ->where('projects.proposal_no',$proposal_no)
                                                              ->get();
                     //if(isset($projects_details) && sizeof($projects_details)==1)
                     }
                   ?>      

                      @if(isset($proposal_no) && !empty($proposal_no) && sizeof($projects_vusual)==1)                     
                         <button class="btn btn-megenta btn-block uppercase">VIEW DETAILS</button>
                       @else
                         <button class="btn btn-megenta no-content btn-block uppercase">ENTER DETAILS</button>
                       @endif 
                    </a>
                </div>
            </li>
            <li>
                <div class="pdoc-panel text-center">
                    <div class="pdoc-icon">
                        <img src="{{ URL::asset('images/icon/4.png') }}" alt="Project Opportunity">
                    </div>
                    <h4 class="pdoc-title">Domain and<br>Hosting</h4>
                                        <a href="@if( isset($proposal_no) && !empty($proposal_no) )
                    								    {{ URL::to('porject_hosting/'.$proposal_no) }}
                    								@else
                    								{{ URL::to('project_not_registered') }}
                    								@endif">
                    <?php
                     if(isset($proposal_no))
                      {
                       $domain_hosting = DB::table('projects')->join('project_hosting','projects.id','=','project_hosting.project_id')
                                                              ->select('projects.proposal_no')
                                                              ->where('projects.proposal_no',$proposal_no)
                                                              ->get();
                     //if(isset($projects_details) && sizeof($projects_details)==1)
                     }
                    ?>      

                       @if(isset($proposal_no) && !empty($proposal_no) && sizeof($domain_hosting)==1) 
                         <button class="btn btn-red btn-block uppercase">VIEW DETAILS</button>
                       @else
                         <button class="btn btn-red no-content btn-block uppercase">ENTER DETAILS</button>
                       @endif 
                    </a>
                </div>
            </li>
            <li>
                <div class="pdoc-panel text-center">
                    <div class="pdoc-icon">
                        <img src="{{ URL::asset('images/icon/5.png') }}" alt="Project Opportunity">
                    </div>
                    <h4 class="pdoc-title">Costing and <br>Pricing</h4>
                                        <a href="@if( isset($proposal_no) && !empty($proposal_no) )
                    								    {{ URL::to('porject_costing/'.$proposal_no) }}
                    								@else
                    								{{ URL::to('project_not_registered') }}
                    								@endif">                    	
                        @if( isset($proposal_no) && !empty($proposal_no))                              
                         <button class="btn btn-green btn-block uppercase">VIEW DETAILS</button>
                        @else
                         <button class="btn btn-green no-content btn-block uppercase">ENTER DETAILS</button>
                        @endif                         
                    </a>
                </div>
            </li>
        </ul>
    </div>
</section>