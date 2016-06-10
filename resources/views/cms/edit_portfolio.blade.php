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
                <ul class="breadcrumb">
                  <li>
                    <p>Home</p>
                  </li>
                  <li><a href="#" class="active"> Update Portfolio</a>
                  </li>
                </ul>
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
           @if($portfolio_info) 
            <form class="" action="{{url('/editing_portfolio/'.$portfolio_info->id)}}" method="post" enctype="multipart/form-data""> 
               <input type="hidden" name="_token" value="{{csrf_token()}}">
               <div class="panel-body">
                <div  class="col-sm-3"></div>
                <div  class="col-sm-6">
                  <div class="row">                                    
                     <div class="form-group">
                       <label>Name</label>                      
                       <input type="text" value="{{$portfolio_info->name}}" class="form-control" name="name">
                     </div> 
                      <div class="form-group">
                        <label for="username">Tags</label>               
                       <input type="text" value="{{$portfolio_info->tags}}" class="form-control" name="tags">
                     </div> 
                      
                      <div class="form-group">
                           <label for="type">User Type</label>
                           <select name="type" class="form-control">
                               <option value="{{$portfolio_info->type}}">{{$portfolio_info->type}}</option>
                               <option value="minimalist">Minimalist</option>
                               <option value="fun">Fun</option>
                               <option value="professional">Professional</option>
                               <option value="elegant">Elegant</option>
                            </select> 
                      </div> 
                      <div class="form-group">
                       <label>Link</label>                      
                       <input type="text" value="{{$portfolio_info->link}}" class="form-control" name="link">
                     </div>  
                     <div class="form-group"> 
                            <label for="username">ScreenShots</label>
                            <input type="file" value="{{$portfolio_info->screenshots}}" class="form-control" name="screenshots" placeholder="ScreenShots">
                           <span>{{ $errors->first('screenshots') }}</span>
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
