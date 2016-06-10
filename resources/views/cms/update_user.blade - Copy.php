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
           @if($user_info) 
            <form class="" action="{{url('/updating_user/'.$user_info->id)}}" method="post" crole="form"> 
               <input type="hidden" name="_token" value="{{csrf_token()}}">
               <div class="panel-body">
                <div  class="col-sm-3"></div>
                <div  class="col-sm-6">
                  <div class="row">                                    
                     <div class="form-group">
                       <label>Full Name</label>                      
                       <input type="text" value="{{$user_info->full_name}}" class="form-control" name="full_name">
                     </div> 
                      <div class="form-group">
                       <label>User Name</label>                      
                       <input type="text" value="{{$user_info->user_name}}" class="form-control" name="user_name">
                     </div> 
                      <div class="form-group">
                       <label>E-mail</label>                      
                       <input type="text" value="{{$user_info->email}}" class="form-control" name="email">
                     </div> 
                      <div class="form-group">
                           <label for="user_type">User Type</label>
                           <select name="user_type" class="form-control">
                              <option value="{{$user_info->user_type}}">{{$user_info->user_type}}</option>
                              <option value="project_manager">Project Manager</option>
                              <option value="designer">Designer</option>
                              <option value="tech_support">Tech Support</option>
                            </select> 
                      </div>                     
                      <div class="form-group">
                         <label for="userpassword">Password</label>
                         <input required type="password" class="form-control"name="password" placeholder="Password">
                       </div>                       
                       <div class="form-group">
                           <label for="userpassword">Confirm Password</label>
                           <input required type="password" class="form-control"name="password_confirmation" placeholder="Confirm Password">                         
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
