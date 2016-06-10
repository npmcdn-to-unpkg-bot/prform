@extends('admin.master')

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
                        <li class="logout"><a href="{{ URL::to('logout') }}">Logout</a></li> | 
                         @if(Auth::user()->user_name=='user1')<li class="logout"><a href="{{ URL::to('cms') }}">CMS</a></li> @endif
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
	        <h1 class="page-heading lighter text-uppercase">PROJECTS FOR CODING 
	        <a class="pull-right goto-proj" href="{{url('/dashboard')}}"><i class="fa fa-list"></i>
 Back To Project Dashboard</a></h1>

	        <div class="row">
	            <div class="col-sm-6">
	            	<a href="{{ URL::to('add_project_coding') }}">
	                <button class="btn btn-red btn-lg btn-has-icon bold text-uppercase">
	                    <span class="bicon">
	                        <img src="{{ URL::asset('images/file-add.png') }}" alt="Create New PROJECT">
	                    </span>
	                    <span class="btext">New Project For Quotation</span>
	                </button>
	                </a>
	            </div>	           
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

	         <h4 align="center" style="color:green"> {{ $errors->first('msg') }}</h4>

	        @include('admin.pages.coding_dashboard.table')

	    </div>
	</section>


  <!--Project Search Area -->
  <script type="text/javascript">
    $(document).ready(function() {       
      // Icon Click Focus
      $('#search_key').click(function(){
        $('input#search_key').focus();
      });

      $("input#search_key").on("keyup", function search() {     
        var search_key = $('#search_key').val();
       
       if(search_key!=""){ 

		       $.ajax({
		            type: "POST",
		            url: "{{url('/porject_search')}}",
		            data: { search_key:search_key },
		            cache: false,
		            success: function(returnProjectData){  
		                $(".table-data").empty();  
		                  
		                 console.log(returnProjectData);
		                        
		               var returnProjectData=JSON.parse(returnProjectData);
		             
		                       $.each(returnProjectData, function(index,project) {

		                      var returnProjectData ='<tr><td>'+project.project_title+'</td><td>'+project.proposal_no+'</td><td>'+project.sales_man+'</td><td>'+project.manager+'</td><td>'+project.date+'</td><td><a class="btn btn-black btn-stroke bold uppercase" href="{{url('porject_edit')}}/'+project.proposal_no+'">Edit</a><a class="btn btn-black btn-stroke bold uppercase" href="{{url('porject_delete')}}/'+project.proposal_no+'"> Delete</a></td></tr>';
		                
		                    $(".table-data").append(returnProjectData);
		                })
		            }
		          }); 
               }      
           });
         })//jquery ends here
  </script>


@endsection