<section class="section section-edit-project">
  @if(isset($all_projects))    
    <form class="form-horizontal" id="example-1-form" method="POST" action="{{ url( Request::path() ) }}">
  @else
    <form class="form-horizontal" id="example-1-form" method="POST" action="{{ url( Request::path() ) }}">
  @endif    
        <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="panel-project-binfo">
                            <div class="form-group btn-edit-pro-group">
                                <div class="col-sm-12 add_update_btn">
                                    <button type="button" id="ready_for_update_btn" class="btn btn-default bold uppercase btn-stroke btn-edit-pro">Edit Project</button>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                   <label class="label-styled">Project Title </label>
                                   <select name="project_id"class="form-control select-styled stk2 project_title_dropdown" disabled="disabled">                                      
                                         @if(isset($selected_projects))
                                           <option value="{{$selected_projects->id}}" selected="selected">{{$selected_projects->project_title}}</option>
                                         @endif                                          
                                   </select>                                  
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label class="label-styled">platform</label>
                                    <select class="form-control select-styled stk2" disabled="disabled">  
                                       <option>Magento</option>                                    
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label class="label-styled">PROJECT TYPE</label>
                                    <select class="form-control select-styled stk2" disabled="disabled">  
                                         <option value="{{$selected_projects->id}}" selected="selected">{{$selected_projects->name}}</option>                                                              
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="panel-project-binfo">
                            <div class="form-group mt-20">
                                <div class="col-sm-12">
                                    <label class="label-styled">PROJECT TIMELINE </label>
                                    <input type="text" class="form-control stk2"  disabled="disabled" name="project_timeline" value="@if(isset($selected_projects)){{$selected_projects->project_timeline}} @endif">
                                </div>
                                <span class="validator_output">{{ $errors->first('project_timeline') }}</span> 
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label class="label-styled">INVISION LINK</label>
                                    <input type="text" class="form-control stk2" disabled="disabled" name="invision_lik" value="@if(isset($selected_projects)){{$selected_projects->invision_lik}} @endif">
                                </div>
                                <span class="validator_output">{{ $errors->first('invision_lik') }}</span> 
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label class="label-styled">INVISION PASSWORD</label>
                                    <input type="text" class="form-control stk2" disabled="disabled" name="invision_password" value="@if(isset($selected_projects)){{$selected_projects->invision_password}} @endif">
                                </div>
                                <span class="validator_output">{{ $errors->first('invision_password') }}</span> 
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="padel project-launch">
                            <div class="padel-header text-center">
                                <h4 class="title">- PROJECT LAUNCH -</h4>
                            </div>
                            <div class="padel-body">
                                <div class="form-group mb-30">
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control stk2" disabled="disabled" name="awarded_to" value="@if(isset($selected_projects)){{$selected_projects->project_timeline}} @endif">
                                    </div>
                                    <span class="validator_output">{{ $errors->first('awarded_to') }}</span> 
                                </div>
                                <div class="form-group mb-30">
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control stk2" disabled="disabled" name="demo_link" value="@if(isset($selected_projects)){{$selected_projects->demo_link}} @endif">
                                    </div>
                                    <span class="validator_output">{{ $errors->first('demo_link') }}</span> 
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control stk2" disabled="disabled" name="live_lik" value="@if(isset($selected_projects)){{$selected_projects->live_lik}} @endif">
                                    </div>
                                    <span class="validator_output">{{ $errors->first('live_lik') }}</span> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
 </section>
 <section class="section section-pro-req-user3">      
            <div class="container">
                <h2 class="page-heading lighter uppercase text-center">PROJECT REQUIREMENTS
                </h2>
                <div class="form-group">
                    <div class="col-sm-7">
                        <label class="uppercase bold">unique pages required</label>&nbsp;&nbsp;
                        <span class="like-input uni-page-count">
                           @if(isset($project_feature_pages)){{sizeof($project_feature_pages)}}  @endif   
                        </span>
                    </div>
                </div>

                <div class="pdetail-box pricing-pdetail-box">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>PAGE #</th>
                                <th>PAGE Name</th>
                                <th>PAGE FEATURE / Requirements</th>
                                <th>Extra Notes</th>
                            </tr>
                        </thead>
                        <tbody id="project_feture_page"> 
                           @if(isset($project_feature_pages))
                            <?php $i=1;?>
                             @foreach($project_feature_pages as $feature_page)
                              <tr>
                                 <td>{{$i++}}</td>
                                 <td><div class="like-input">{{$feature_page->page_name}}</div></td>
                                 <td><div class="like-input">{{$feature_page->page_requirements}}</div></td>
                                 <td><div class="like-input">{{$feature_page->extra_notes}}</div></td>
                              </tr>  
                             @endforeach
                           @endif            
                        </tbody>
                    </table>
                </div>

                <div class="upload-req-panel wagon mt-40">  
                    <div class="wagon-body">
                        <div class="row">                           
                            <div class="col-xs-12">
                                <div class="other-note-holder">
                                    <label>Other Notes:</label>
                                    <textarea class="form-control" name="other_note">@if(isset($selected_projects)){{$selected_projects->other_note}} @endif</textarea>                                    
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>

             <!--   
               <div class="row">
                  <div class="col-sm-12 text-right">
                    <button  type="submit" class="btn btn-primary text-uppercase bold btn-afix mt-15">Save</button>
                  </div>
                </div>
             -->

            </div>
        </form>
    </section>

    <style type="text/css">
      .validator_output{color: red;}
    </style>

    <script type="text/javascript">
       $(document).ready(function(){
         $('.project_title_dropdown').change(function(){
            var project_id = $(this).val();
           
             $.ajax({

                    type:"post",
                    url:"{{url('/search_project')}}",
                    data:{project_id:project_id},
                    cache:false,
                    success:function(returnProjectData)
                     { var i=0;
                       console.log(returnProjectData);
                        var returnProjectData=JSON.parse(returnProjectData);               
                        
                        $("#project_type").empty();

                         $.each(returnProjectData.project_info, function(index,projects) {
                            //console.log(projects.name)  ;
                             var project_type ='<option value="'+projects.id+'">'+projects.name+'</option>';
                                      
                       $("#project_type").append(project_type);
                      })
                       
                        $("#project_feture_page").empty();

                         $.each(returnProjectData.feture_pages, function(index,pages) {
                              i++;
                             var feture_page ='<tr><td>'+i+'</td><td><div class="like-input">'+pages.page_name+'</div></td><td><div class="like-input">'+pages.page_requirements+'</div></td><td><div class="like-input">'+pages.extra_notes+'</div></td></tr>';
                                      
                       $("#project_feture_page").append(feture_page);
                     })                            
                    }

         });
       });   
      });    
    </script>





