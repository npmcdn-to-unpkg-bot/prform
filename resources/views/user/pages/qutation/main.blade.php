@include('user.pages.qutation.header')
    <section class="main-content">
	  <form class="form-horizontal" id="example-1-form" method="POST" action="{{ url( Request::path() ) }}">
        <section class="section section-edit-project section-edit-project-user3">           
                <div class="container">
                       @if(Session::has('msg')) <h5 align="center" style="color:green"> {{Session::get('msg')}}<h5> @endif 
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="panel-project-binfo mt-20">
                                <!-- <div class="form-group btn-edit-pro-group">
                                       <div class="col-sm-12">
                                          <button class="btn btn-default bold uppercase btn-stroke btn-edit-pro">Edit Project</button>
                                       </div>
                                     </div>
                                  -->
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="label-styled">Project Title</label>
                                         <select required name="project_id" class="form-control select-styled stk2 project_title_dropdown">
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
                                         <select class="form-control select-styled stk2" id="project_type"></select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="panel-project-binfo">
                                <div class="form-group mt-20"> 
                                    <div class="col-sm-12">
                                        <label class="label-styled">PROJECT TIMELINE </label>
                                        <input type="text" class="form-control stk2" id="project_timeline">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="label-styled">INVISION LINK</label>
                                        <input type="text" class="form-control stk2" id="invision_lik">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="label-styled">INVISION PASSWORD</label>
                                        <input type="text" class="form-control stk2" id="invision_password">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="panel-project-binfo panel-btn-quote">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button type="button" class="btn btn-red btn-afix text-uppercase bold btn-lg btn-block">
                                            QUOTE THIS PROJECT
                                        </button>
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
                                        <textarea class="form-control" id="other_note"></textarea>                                       
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </div>
                </div>            
        </section>
        <section class="section section-quote-project-vendor">
            <div class="container">
                <h2 class="page-heading lighter uppercase text-center">QUOTE THIS PROJECT</h2>              
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="quote-heading">
                                <h4 class="title">Send us your quotation</h4>
                                <p>
                                    Etiam porta sem malesuada magna mollis euismod. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui.
                                </p>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="quote-vend">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control stk-primary stk2" name="vendor_name" placeholder="Vendor Name">
                                        <span class="validator_output">{{ $errors->first('vendor_name') }}</span>
									</div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control stk-primary stk2" name="email" placeholder="Vendor Email">
                                        <span class="validator_output">{{ $errors->first('email') }}</span>
									</div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control stk-primary stk2" name="price" placeholder="Your Price">
                                        <span class="validator_output">{{ $errors->first('price') }}</span>
									</div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <div class="input-group vend-timeline">
                                            <input type="text" class="form-control stk-primary stk2" name="day" placeholder="Your timeline">
                                            <span class="input-group-addon" id="sizing-addon2">day</span>
											<span class="validator_output">{{ $errors->first('day') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="quote-vend">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <textarea class="form-control stk-primary stk2" name="message" placeholder="Message"></textarea>
                                         <span class="validator_output">{{ $errors->first('message') }}</span> 
									</div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <div class="vend-timeline">
                                            <button class="btn btn-red btn-afix text-uppercase bold btn-lg btn-block" type="submit">
                                            SUBMIT MY QUOTATION
                                        </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                           
                </div>
            </section>
	    </form>    	
    </section>
   
   
   @include('user.pages.qutation.footer')