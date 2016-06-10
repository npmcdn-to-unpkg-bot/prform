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
						<button class="btn btn-orange btn-block">VIEW DETAILS</button>
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
                    	<button class="btn btn-blue btn-block">VIEW DETAILS</button>
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
                    	<button class="btn btn-light-megenta btn-block">VIEW DETAILS</button>
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
                    	<button class="btn btn-light-red btn-block">VIEW DETAILS</button>
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
                    	<button class="btn btn-green btn-block">VIEW DETAILS</button>
                    </a>
                </div>
            </li>
        </ul>
    </div>
</section>