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
                <h4 class="p-b-5"><span class="semi-bold">Create</span> Portfolio </h4>
              </div>
              <div class="modal-body">

              <form role="form" action="{{url('/create_portfolio')}}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                 
                <div class="col-sm-12">  
                  <div class="row">  
                   <div class="col-sm-12">                        
                        <div class="form-group">
                          <label for="username">Name</label>
                          <input required type="text" value="{{Request::old('name')}}" class="form-control" name="name" placeholder="Name">
                        </div>
                        <div class="form-group"> 
                            <label for="username">Tags</label>
                            <input required type="text" value="{{Request::old('tags')}}" class="form-control" name="tags" placeholder="Tags">
                           <span>{{ $errors->first('tags') }}</span>
                        </div>                         
                        <div class="form-group">
                           <label for="user_type">Type</label>
                           <select name="type" class="form-control">
                              <option value="minimalist">Minimalist</option>
                              <option value="fun">Fun</option>
                              <option value="professional">Professional</option>
                              <option value="elegant">Elegant</option>
                            </select>                          
                           <span>{{ $errors->first('type') }}</span>
                        </div>
                        <div class="form-group"> 
                            <label for="username">Link</label>
                            <input required type="text" value="{{Request::old('link')}}" class="form-control" name="link" placeholder="Link">
                           <span>{{ $errors->first('link') }}</span>
                        </div>      
                        <div class="form-group"> 
                            <label for="username">ScreenShots</label>
                            <input type="file" value="{{Request::old('screenshots')}}" class="form-control" name="screenshots" placeholder="ScreenShots">
                           <span>{{ $errors->first('tags') }}</span>
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
                <div class="panel-title">Portfolio 
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
                        <th>sitemap</th>
                        <th>look and fell</th>
                        <th>References Website</th>                        
                        <th>About References</th>                        
                        <th>Related Documents</th>						
						<th>Preferend Fonts</th>                        
                        <th>Prefers Color</th> 
                        <th>Other Notes</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @if($look_and_fell) 
                       @foreach($look_and_fell as $look_feel)
                        <tr>                           
                          <td class="v-align-middle semi-bold">
                            {{$look_feel->sitemap}}
                          </td> 
                          <td class="v-align-middle semi-bold">
                            {{$look_feel->look_and_fell}}
                          </td> 
                          <td class="v-align-middle semi-bold">
                            {{$look_feel->references_website}}
                          </td> 						 
                           <td class="v-align-middle semi-bold">
                            {{$look_feel->about_references}}
                          </td> 
						  <td class="v-align-middle semi-bold">
                            {{$look_feel->related_documents}}
                          </td> 
                          <td class="v-align-middle semi-bold">
                            {{ ucfirst($look_feel->preferend_fonts)}}
                          </td> 
                           <td class="v-align-middle semi-bold">
                            {{$look_feel->prefers_color}}
                          </td> 
						  <td class="v-align-middle semi-bold">
                            {{$look_feel->other_notes}}
						  </td>    
                          <td class="v-align-middle semi-bold">
                            <a href="{{url('/edit_look_feel/'.$look_feel->id)}}"><i class="fa fa-pencil-square-o"></i></a>                             
                          </td>                        
                        </tr> 
                      @endforeach
                    @endif   
                    </tbody>
                </table>
                </div>
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