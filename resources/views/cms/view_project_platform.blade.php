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
                <h4 class="p-b-5"><span class="semi-bold">Project </span> Platform </h4>
              </div>
              <div class="modal-body">

              <form role="form" action="{{url('/create_platform')}}" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                 
                <div class="col-sm-12">  
                  <div class="row">  
                   <div class="col-sm-12">                        
                        <div class="form-group">
                          <label for="name">Name</label>
                          <input required type="text" name="name" value="{{Request::old('name')}}" class="form-control" name="full_name" placeholder="Your Name">
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
                <div class="panel-title">Project Platform
                </div>
                <div class="pull-right">
                  <div class="col-xs-6">
                    <input type="text" id="search-table" name="name" class="form-control pull-right" placeholder="Search">
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
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                     @if($allplatforms) 
                       @foreach($allplatforms as $platform)
                        <tr> 
                          </td>
                          <td class="v-align-middle semi-bold">
                            {{$platform->name}}
                          </td>                           
                           <td class="v-align-middle">                               
                               <a href="{{url('/edit_project_platform/'.$platform
                               ->id)}}"><i class="fa fa-pencil-square-o"></i></a> || 
                               <a href="{{url('/delete_project_platform/'.$platform
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