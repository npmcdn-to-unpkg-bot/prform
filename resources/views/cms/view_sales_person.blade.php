@extends('cms.layouts.master')
   @section('content')
    <!-- START PAGE CONTENT WRAPPER -->
    <div class="page-content-wrapper">
      <div class="content"> 
            <!-- START PAGE CONTENT -->
          
          <!-- MODAL STICK UP  -->
        <div class="modal fade stick-up" id="addNewAppModal" tabindex="-1" role="dialog" aria-labelledby="addNewAppModal" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header clearfix ">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                </button>
                <h4 class="p-b-5"><span class="semi-bold">Create</span> User </h4>
              </div>
              <div class="modal-body">

              <form role="form" action="{{url('/create_new_user')}}" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                 
                <div class="col-sm-12">  
                  <div class="row">  
                   <div class="col-sm-12">                        
                        <div class="form-group">
                          <label for="username">Full Name</label>
                          <input required type="text" value="{{Request::old('full_name')}}" class="form-control" name="full_name" placeholder="Your Name">
                        </div>
                        <div class="form-group"> 
                            <label for="username">Username</label>
                            <input required type="text" value="{{Request::old('user_name')}}" class="form-control" name="user_name" placeholder="your_name">
                           <span>{{ $errors->first('user_name') }}</span>
                        </div> 
                        <div class="form-group">
                           <label for="username">Email</label>
                           <input required type="email" value="{{Request::old('email')}}" class="form-control" name="email" placeholder="name@mail.com">
                           <span>{{ $errors->first('email') }}</span>
                        </div>
                        <div class="form-group">
                           <label for="user_type">User Type</label>
                           <select name="user_type" class="form-control">
                              <option value="sales_person">Sales Person</option>
                              <option value="project_manager">Project Manager</option>
                              <option value="designer">Designer</option>
                              <option value="tech_support">Tech Support</option>
                              <option value="developing_team">Developing Team</option>
                           </select>                          
                           <span>{{ $errors->first('user_type') }}</span>
                        </div>
                       <div class="form-group">
                         <label for="userpassword">Password</label>
                         <input required type="password" class="form-control"name="password" placeholder="Password">
                         <span>{{ $errors->first('zipcode') }}</span>
                       </div>                       
                       <div class="form-group">
                           <label for="userpassword">Confirm Password</label>
                           <input required type="password" class="form-control"name="password_confirmation" placeholder="Confirm Password">                         
                      </div>                     
                   </div> <!--end left coloumn -->                                  
                  </div>  
                 </div>              
                </div>
              <div class="modal-footer">
                 <button class="btn btn-success" type="submit">Submit</button>                
              </div>
            </form>    
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- END MODAL STICK UP  -->          
          
       
          <!-- START JUMBOTRON -->
          <div class="jumbotron" data-pages="parallax">
            <div class="container-fluid container-fixed-lg sm-p-l-20 sm-p-r-20">
           
           </div>
         </div>
          <!-- END JUMBOTRON -->
          <!-- START CONTAINER FLUID -->
          <div class="container-fluid container-fixed-lg bg-white">
            <!-- START PANEL -->
            <div class="panel panel-transparent">
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
                <div class="panel-title">Active Users
                </div>
                <div class="pull-right">
                  <div class="col-xs-6">
                    <input type="text" id="search-table" class="form-control pull-right" placeholder="Search">
                  </div>
		              <div class="col-xs-6">
                     <button id="show-modal" class="btn btn-primary btn-cons"><i class="fa fa-plus"></i>Create New</button>
                  </div> 
		              
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="panel-body">
                
                <table class="table table-hover demo-table-search" id="tableWithSearch">
                   <thead>
                      <tr>                        
                        <th>Name</th>
                        <th>Username</th>
                        <th>E-mail</th>                        
                        <th>User Type</th> 
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                     @if($allusers) 
                       @foreach($allusers as $user)
                        <tr> 
                          </td>
                          <td class="v-align-middle semi-bold">
                            {{$user->full_name}}
                          </td> 
                          <td class="v-align-middle semi-bold">
                            {{$user->user_name}}
                          </td> 
                          <td class="v-align-middle semi-bold">
                            {{$user->email}}
                          </td> 
                           <td class="v-align-middle semi-bold">
                            {{$user->user_type}}
                          </td> 
                           <td class="v-align-middle">                               
                               <a href="{{url('/update_user/'.$user
                               ->id)}}"><i class="fa fa-pencil-square-o"></i></a> || 
                               <a href="{{url('/delete_user/'.$user
                               ->id)}}" onClick="return confirmation()"><i class="pg-trash"></i></a>
                          </td>  
                        </tr> 
                      @endforeach
                    @endif                     
                    </tbody>
                </table></div>
              </div>
            </div>
            <!-- END PANEL -->
          </div>
          <!-- END CONTAINER FLUID -->
         
        </div>
        <!-- END PAGE CONTENT -->
      </div>  
    </div>
   
        
   @endsection