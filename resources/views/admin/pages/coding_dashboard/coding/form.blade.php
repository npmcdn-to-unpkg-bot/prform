<section class="section section-edit-project">
    <form class="form-horizontal" id="example-1-form" method="POST" action="{{ url( Request::path() ) }}">
        <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="panel-project-binfo">
                            <div class="form-group btn-edit-pro-group">
                                <div class="col-sm-12">
                                   <!-- <button class="btn btn-default bold uppercase btn-stroke btn-edit-pro">Edit Project</button> -->
                                    <button  type="submit" class="btn btn-default bold uppercase btn-stroke btn-edit-pro">Save</button>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                   <label class="label-styled">Project Title</label>
                                   <select required name="project_id"class="form-control select-styled stk2 project_title_dropdown">
                                       <option value="">Please Select Project</option>
                                         @if(isset($all_projects))
                                           @foreach($all_projects as $projects)
                                              <option value="{{$projects->id}}">{{$projects->project_title}}</option>
                                           @endforeach
                                         @endif
                                   </select>
                                   <span class="validator_output">{{ $errors->first('project_id') }}</span> 
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label class="label-styled">platform</label>
                                    <select class="form-control select-styled stk2">  
                                       <option>Magento</option>                                    
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label class="label-styled">PROJECT TYPE</label>
                                    <select class="form-control select-styled stk2" id="project_type">                                       
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
                                    <input type="text" class="form-control stk2" name="project_timeline">
                                </div>
                                <span class="validator_output">{{ $errors->first('project_timeline') }}</span> 
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label class="label-styled">INVISION LINK</label>
                                    <input type="text" class="form-control stk2" name="invision_lik">
                                </div>
                                <span class="validator_output">{{ $errors->first('invision_lik') }}</span> 
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label class="label-styled">INVISION PASSWORD</label>
                                    <input type="text" class="form-control stk2" name="invision_password">
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
                                        <input type="text" class="form-control stk2" name="awarded_to" placeholder="Awarded to">
                                    </div>
                                    <span class="validator_output">{{ $errors->first('awarded_to') }}</span> 
                                </div>
                                <div class="form-group mb-30">
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control stk2" name="demo_link" placeholder="Demo Link">
                                    </div>
                                    <span class="validator_output">{{ $errors->first('demo_link') }}</span> 
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control stk2" name="live_lik" placeholder="Live Link">
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
                        </tbody>
                    </table>
                </div>

                <div class="upload-req-panel wagon mt-40">  
                    <div class="wagon-body">
                        <div class="row">                           
                            <div class="col-xs-12">
                                <div class="other-note-holder">
                                    <label>Other Notes:</label>
                                    <textarea class="form-control" name="other_note"></textarea>
                                    
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





