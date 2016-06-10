@extends('cms.layouts.master')
   @section('content')
    
	 <div class="page-content-wrapper">
        <!-- START PAGE CONTENT -->
        <div class="content">
          <!-- START JUMBOTRON -->
          <div class="jumbotron" data-pages="parallax">
            <div class="container-fluid container-fixed-lg sm-p-l-20 sm-p-r-20">
              <div class="inner">
                <!-- START BREADCRUMB -->
                <!-- <ul class="breadcrumb">
                  <li>
                    <p>Home</p>
                  </li>
                  <li><a href="#" class="active"> User</a>
                  </li>
                </ul> -->
                <!-- END BREADCRUMB -->                
              </div>
            </div>
          </div>
          
          <!-- START CONTAINER FLUID -->
          <div class="container-fluid container-fixed-lg">
            <!-- START PANEL -->
            <div class="panel panel-default">
              <div class="panel-heading">               
                <div class="col-md-12"> 
                 @if(Session::has('flash_message'))
                 <div class="alert alert-success fade in">
                   <a href="#" class="close" data-dismiss="alert">&times;</a>
                  <center> {{Session::get('flash_message')}}</center>
                 </div> 
                @elseif(Session::has('alert_class'))
                    <div class="alert alert-danger fade in">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                         <center> {{Session::get('alert_class')}}</center>
                    </div>
                @endif  
               
                </div>
                
              </div>
           @if($project_platform) 
            <form class="" action="{{url('/editing_project_platform/'.$project_platform->id)}}" method="post" crole="form"> 
               <input type="hidden" name="_token" value="{{csrf_token()}}">
               <div class="panel-body">
                <div  class="col-sm-3"></div>
                <div  class="col-sm-6">
                  <div class="row">                                    
                     <div class="form-group">
                       <label>Project Platform Name</label>                      
                       <input type="text" class="form-control" name="name" value="{{$project_platform->name}}">
                     </div>                       
                      <div class="form-group">
                          <div class="col-sm-2 col-sm-offset-5">
                            <button class="btn btn-success" type="submit">Submit</button>
                          </div>  
                      </div>
                  </div>
               </div>  
            </form>
           @endif 
                
            </div>
            <!-- END PANEL -->
          </div>
          <!-- END CONTAINER FLUID -->
        </div>
        <!-- END PAGE CONTENT -->        
      </div>
@endsection
