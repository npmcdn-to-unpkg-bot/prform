@extends('user.master')

@section('title', 'Dashboard')

@section('header_styles')
    @parent
    <script src="{{ URL::asset('plugins/icheck/icheck.min.js') }}"></script>
    <link href="{{ URL::asset('plugins/icheck/skins/flat/flat.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('plugins/icheck/skins/flat/green.css') }}" rel="stylesheet">

	<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<!--     <script src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
    <script src="{{ URL::asset('js/datatables.js') }}"></script> -->

@endsection

@section('footer_scripts')
    @parent
    <script src="{{ URL::asset('plugins/icheck/icheck.min.js') }}"></script>
@endsection

@section('header_nav')
    <header class="dashboard-header">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="list-inline pull-right nav-user">
                        <li><span>You are logged in as</span></li>
                        <li class="username"><a href=""><i class="fa fa-user"></i>{{Auth::user()->user_name}}</a></li>
                        <li class="logout"><a href="{{ URL::to('logout') }}">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

@endsection

@section('header_banner')

@endsection

@section('body_class')
	class="page-dashboard"
@endsection

@section('content')

	<section class="main-content dashboard-content">
	    <div class="container">
	        <h1 class="page-heading lighter text-uppercase">USER DASHBOARD</h1>

	        <div class="row">
	            <div class="col-sm-6">
	            	<a href="{{ URL::to('add_project_quotation') }}">
	                <button class="btn btn-red btn-lg btn-has-icon bold text-uppercase">
	                    <span class="bicon">
	                        <img src="{{ URL::asset('images/file-add.png') }}" alt="Create New PROJECT">
	                    </span>
	                    <span class="btext">New Project For Quotation</span>
	                </button>
	                </a>
	            </div>
	            {{ $errors->first('msg') }}
	            <div class="col-sm-6">
	                <div class="input-group input-group-eql search-group">
	                  <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
	                    <input type="text" class="form-control" id="search_key"  name="search_key" autocomplete="off">
	                    <span class="input-group-btn">
	                        <button type="button" class="btn btn-black bold uppercase">Search</button>
	                    </span>
	                </div>
	            </div>
	        </div>

	        @include('user.pages.dashboard.table')

	    </div>
	</section>

  <!--Project Search Area -->
  <script type="text/javascript">
    /*$(document).ready(function() {       
      // Icon Click Focus
      $('#search_key').click(function(){
        $('input#search_key').focus();
      });

      $("input#search_key").on("keyup", function search() {     
        var search_key = $('#search_key').val();
       
       if(search_key!=""){ 

		       $.ajax({
		            type: "POST",
		            url: "{{url('/user_porject_search')}}",
		            data: { search_key:search_key },
		            cache: false,
		            success: function(returnProjectData){  
		                $(".table-data-user").empty();  		                  
		                 console.log(returnProjectData);

		                  var returnProjectData=JSON.parse(returnProjectData);
		             
		                       $.each(returnProjectData, function(index,project) {

		                      var returnProjectData ='<tr><td>'+project.project_title+'</td><td>'+project.proposal_no+'</td><td>'+project.creator_name+'</td><td>'+project.sales_man+'</td><td>'+project.manager+'</td><td>'+project.date+'</td><td><button class="btn btn-black btn-stroke bold uppercase"><a href="{{url('view_porject')}}/'+project.proposal_no+'">View</a></button></td></tr>';
		                
		                    $(".table-data-user").append(returnProjectData);
		                })
		            }
		          }); 
               }      
           });
         })//jquery ends here*/
  </script>


@endsection