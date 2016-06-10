         <section class="section section-cost-break">
            <div class="container">
                
                  @if(Auth::user()->user_name=='user1')

          
       @if(sizeof($project_module)>0)      
          <form class="form-horizontal" id="example-1-form" method="POST"  action="{{ url( Request::path() ) }}">
            <input name="_token" type="hidden" value="{{ csrf_token() }}">

   <h2 class="page-heading lighter text-uppercase clearfix">PROJECT COST BREAKDOWN <button type="button" class="btn btn-stroke btn-black pull-right text-uppercase cost_edit_btn">Edit</button> <button type="submit" class="btn btn-stroke btn-black pull-right text-uppercase btn-success btn-submit-cost">SUBMIT</button></h2>

                <table class="table table-pricing-quote">
                    <thead>
                        <tr>
                            <th style="width: 40%">&nbsp;</th>
                            <th>Estimate Cost</th>
                            <th>Actual Cost</th>
                            <th>Price quoted</th>
                            <th style="width: 80px;">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="5" class="child-td">                             
                                 <table>
                                    <thead>                                     
                                      @foreach($project_module as $category)
                                        @if($category->module_name =='design_and_conceptualization')                                      
                                          <tr class="add_new_column_design">
                                            <th style="width: 40%"><span> Design and Conceptualization</span></th>
                                            <input type="hidden" class="form-control" name="design_module_name" value="design_and_conceptualization" /></th>
                                            <th><input type="text" required class="form-control" name="design_estimated_cost" value="{{$category->estimated_cost}}" />
                                            <th><input type="text" required class="form-control" name="design_actual_cost" value="{{$category->actual_cost}}"/></th>  
                                            <th><input type="text" required class="form-control" name="design_quoted_cost" value="{{$category->quoted_cost}}"/></th>                                           
                                            <th style="width: 80px;"><button type="button" class="display-non btn add_design_btn"><i class="ion-plus"></i></button></th> 
                                         </tr> 
                                    </thead>
                                    <tbody class="add_design_row">
                                    <?php $design_sub_category = DB::table('project_cost_breakdowns')->join('project_cost_subcategories','project_cost_breakdowns.id','=','project_cost_subcategories.category_id')
                                                                     ->select('project_cost_subcategories.*')
                                                                     ->where('project_cost_subcategories.category_id',$category->id) 
                                                                     ->get();                                                                  
                                     ?>  
                                    @if(isset($design_sub_category))  
                                     @foreach($design_sub_category as $design) 
                                        <tr>                                            
                                            <td><input type="text" required class="form-control" name="design_sub_category_name[]" value="{{$design->sub_category_name}}" /></td>
                                            <td><input type="text" required class="form-control" name="design_sub_estimated_cos[]" value="{{$design->sub_estimated_cost}}"/></td>
                                            <td><input type="text" required class="form-control" name="design_sub_actual_cost[]" value="{{$design->sub_actual_cost}}"/></td>
                                            <td><input type="text" required class="form-control" name="design_sub_quoted_cos[]" value="{{$design->sub_quoted_cost}}"/></td>                                            
                                        </tr>                                        
                                    
                                       @endforeach
                                     @endif 
                                    @endif  
                                  @endforeach 
                                   </tbody>  
                                     
                                 </table>
                             
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5" class="child-td">
                                <table>
                                    <thead>                              
                                     @foreach($project_module as $development_category)
                                      @if($development_category->module_name =='development')   
                                        <tr class="add_new_column_development">
                                            <th style="width: 40%"><span>Development</span></th>
                                            <input type="hidden" class="form-control" name="development_module_name" value="development" />
                                            <th><input type="text" required class="form-control" name="development_estimated_cost" value="{{$development_category->estimated_cost}}"/></th>
                                            <th><input type="text" required class="form-control" name="development_actual_cost" value="{{$development_category->actual_cost}}"/></th>  
                                            <th><input type="text" required class="form-control" name="development_quoted_cost" value="{{$development_category->quoted_cost}}"/></th>                                       
                                            <th style="width: 80px;"><button type="button" class=" display-non btn add_development_btn"><i class="ion-plus"></i></button></th>
                                        </tr>
                                    </thead>                                    
                                    <tbody class="add_development_row">                                        
                                   
                                      <?php $development_sub_category = DB::table('project_cost_breakdowns')->join('project_cost_subcategories','project_cost_breakdowns.id','=','project_cost_subcategories.category_id')
                                                                         ->select('project_cost_subcategories.*')
                                                                         ->where('project_cost_subcategories.category_id',$development_category->id) 
                                                                         ->get();                                                                  
                                     ?>  
                                    @if(isset($development_sub_category))  
                                     @foreach($development_sub_category as $development) 
                                        <tr>                                            
                                            <td><input type="text" required class="form-control" name="development_sub_category_name[]" value="{{$development->sub_category_name}}" /></td>
                                            <td><input type="text" required class="form-control" name="development_sub_estimated_cos[]" value="{{$development->sub_estimated_cost}}"/></td>
                                            <td><input type="text" required class="form-control" name="development_sub_actual_cost[]" value="{{$development->sub_actual_cost}}"/></td>
                                            <td><input type="text" required class="form-control" name="development_sub_quoted_cos[]" value="{{$development->sub_quoted_cost}}"/></td>                                            
                                        </tr>                                        
                                    
                                       @endforeach
                                     @endif 
                                    @endif  
                                  @endforeach 
                                   </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5" class="child-td">
                                <table>
                                    <thead>
                                     @foreach($project_module as $mobile_category)
                                      @if($mobile_category->module_name =='mobile')   
                                        <tr class="add_new_column_mobile">
                                            <th style="width: 40%"><span>Mobile Responsive</span></th>
                                            <input type="hidden" class="form-control" name="mobile_module_name" value="mobile" />
                                            <th><input type="text" required class="form-control" name="mobile_estimated_cost" value="{{$mobile_category->estimated_cost}}"/></th>
                                            <th><input type="text" required class="form-control" name="mobile_actual_cost" value="{{$mobile_category->actual_cost}}"/></th>  
                                            <th><input type="text" required class="form-control" name="mobile_quoted_cost" value="{{$mobile_category->quoted_cost}}"/></th>                                              
                                           <th style="width: 80px;"><button type="button" class="display-non btn add_mobile_btn"><i class="ion-plus"></i></button></th> 
                                        </tr>                                        
                                    </thead>
                                    <tbody class="add_mobile_row">
                                         <?php $mobile_sub_category = DB::table('project_cost_breakdowns')->join('project_cost_subcategories','project_cost_breakdowns.id','=','project_cost_subcategories.category_id')
                                                                     ->select('project_cost_subcategories.*')
                                                                     ->where('project_cost_subcategories.category_id',$mobile_category->id) 
                                                                     ->get();                                                                  
                                     ?>  
                                    @if(isset($mobile_sub_category))  
                                     @foreach($mobile_sub_category as $mobile) 
                                        <tr>                                            
                                            <td><input type="text" required class="form-control" name="mobile_sub_category_name[]" value="{{$mobile->sub_category_name}}" /></td>
                                            <td><input type="text" required class="form-control" name="mobile_sub_estimated_cos[]" value="{{$mobile->sub_estimated_cost}}"/></td>
                                            <td><input type="text" required class="form-control" name="mobile_sub_actual_cost[]" value="{{$mobile->sub_actual_cost}}"/></td>
                                            <td><input type="text" required class="form-control" name="mobile_sub_quoted_cos[]" value="{{$mobile->sub_quoted_cost}}"/></td>                                            
                                        </tr>                                        
                                    
                                       @endforeach
                                     @endif 
                                    @endif  
                                  @endforeach
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5" class="child-td">
                                <table>
                                    <thead>
                                      @foreach($project_module as $hosting_category)
                                       @if($hosting_category->module_name =='hosting')   
                                        <tr class="add_new_column_hosting">
                                            <th style="width: 40%"><span>Hosting</span></th>
                                            <input type="hidden" class="form-control" name="hosting_module_name" value="hosting" />
                                            <th><input type="text" required class="form-control" name="hosting_estimated_cost" value="{{$hosting_category->estimated_cost}}"/></th>
                                            <th><input type="text" required class="form-control" name="hosting_actual_cost" value="{{$hosting_category->actual_cost}}"/></th>  
                                            <th><input type="text" required class="form-control" name="hosting_quoted_cost" value="{{$hosting_category->quoted_cost}}"/></th>                                    
                                           <th style="width: 80px;"><button type="button" class="display-non btn add_hosting_btn"><i class="ion-plus"></i></button></th> 
                                        </tr>                                        
                                    </thead>
                                    <tbody class="add_hosting_row">
                                    <?php $hosting_sub_category = DB::table('project_cost_breakdowns')->join('project_cost_subcategories','project_cost_breakdowns.id','=','project_cost_subcategories.category_id')
                                                             ->select('project_cost_subcategories.*')
                                                             ->where('project_cost_subcategories.category_id',$hosting_category->id) 
                                                             ->get();                                                                  
                                     ?>  
                                    @if(isset($hosting_sub_category))  
                                     @foreach($hosting_sub_category as $hosting) 
                                        <tr>                                            
                                            <td><input type="text" required class="form-control" name="hosting_sub_category_name[]" value="{{$hosting->sub_category_name}}" /></td>
                                            <td><input type="text" required class="form-control" name="hosting_sub_estimated_cos[]" value="{{$hosting->sub_estimated_cost}}"/></td>
                                            <td><input type="text" required class="form-control" name="hosting_sub_actual_cost[]" value="{{$hosting->sub_actual_cost}}"/></td>
                                            <td><input type="text" required class="form-control" name="hosting_sub_quoted_cos[]" value="{{$hosting->sub_quoted_cost}}"/></td>                                            
                                        </tr>  
                                       @endforeach
                                     @endif 
                                    @endif  
                                  @endforeach

                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5" class="child-td">
                                <table>
                                    <thead>
                                     @foreach($project_module as $domain_category)
                                       @if($domain_category->module_name =='domain')   
                                        <tr class="add_new_column_domain">
                                            <th style="width: 40%"><span>Domain Registration</span></th>
                                            <input type="hidden" class="form-control" name="domain_module_name" value="domain" />
                                            <th><input type="text" required class="form-control" name="domain_estimated_cost" value="{{$domain_category->estimated_cost}}"/></th>
                                            <th><input type="text" required class="form-control" name="domain_actual_cost" value="{{$domain_category->actual_cost}}"/></th>  
                                            <th><input type="text" required class="form-control" name="domain_quoted_cost" value="{{$domain_category->quoted_cost}}"/></th>                                      
                                         <th style="width: 80px;"><button type="button" class="display-non btn add_domain_btn"><i class="ion-plus"></i></button></th>
                                        </tr>                                        
                                    </thead>
                                    <tbody class="add_domain_row">
                                        
                                     <?php $domain_sub_category = DB::table('project_cost_breakdowns')->join('project_cost_subcategories','project_cost_breakdowns.id','=','project_cost_subcategories.category_id')
                                                         ->select('project_cost_subcategories.*')
                                                         ->where('project_cost_subcategories.category_id',$domain_category->id) 
                                                         ->get();                                                                  
                                     ?>  
                                    @if(isset($domain_sub_category))  
                                     @foreach($domain_sub_category as $domain) 
                                        <tr>                                            
                                            <td><input type="text" required class="form-control" name="domain_sub_category_name[]" value="{{$domain->sub_category_name}}" /></td>
                                            <td><input type="text" required class="form-control" name="domain_sub_estimated_cos[]" value="{{$domain->sub_estimated_cost}}"/></td>
                                            <td><input type="text" required class="form-control" name="domain_sub_actual_cost[]" value="{{$domain->sub_actual_cost}}"/></td>
                                            <td><input type="text" required class="form-control" name="domain_sub_quoted_cos[]" value="{{$domain->sub_quoted_cost}}"/></td>                                            
                                        </tr>  
                                       @endforeach
                                     @endif 
                                    @endif  
                                  @endforeach
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5" class="child-td">
                                <table>
                                    <thead>
                                      @foreach($project_module as $plugins_category)
                                        @if($plugins_category->module_name =='plugins')     
                                        <tr class="add_new_column_plugin">                                          
                                            <th style="width: 40%"><span>Plug-ins</span></th>
                                            <input type="hidden" class="form-control" name="plugins_module_name" value="plugins" />
                                            <th><input type="text" required class="form-control" name="plugins_estimated_cost" value="{{$plugins_category->estimated_cost}}"/></th>
                                            <th><input type="text" required class="form-control" name="plugins_actual_cost" value="{{$plugins_category->actual_cost}}"/></th>  
                                            <th><input type="text" required class="form-control" name="plugins_quoted_cost" value="{{$plugins_category->quoted_cost}}"/></th>                                           
                                           <th style="width: 80px;"><button type="button" class="display-non btn add_plugin_btn"><i class="ion-plus"></i></button></th>  
                                        </tr>
                                       
                                    </thead>
                                     <?php $plugins_sub_category = DB::table('project_cost_breakdowns')->join('project_cost_subcategories','project_cost_breakdowns.id','=','project_cost_subcategories.category_id')
                                                                     ->select('project_cost_subcategories.*')
                                                                     ->where('project_cost_subcategories.category_id',$plugins_category->id) 
                                                                     ->get();                                                                  
                                      ?>  
                                    <tbody class="add_plugin_row">  
                                     @if(isset($plugins_sub_category))  
                                       @foreach($plugins_sub_category as $plugins_sub) 
                                        <tr>                                            
                                            <td><input type="text" required class="form-control" name="plugins_sub_category_name[]" value="{{$plugins_sub->sub_category_name}}" /></td>
                                            <td><input type="text" required class="form-control" name="plugins_sub_estimated_cos[]" value="{{$plugins_sub->sub_estimated_cost}}"/></td>
                                            <td><input type="text" required class="form-control" name="plugins_sub_actual_cost[]" value="{{$plugins_sub->sub_actual_cost}}"/></td>
                                            <td><input type="text" required class="form-control" name="plugins_sub_quoted_cos[]" value="{{$plugins_sub->sub_quoted_cost}}"/></td>    
                                        </tr>                                      
                                   
                                      @endforeach
                                     @endif 
                                    @endif  
                                  @endforeach   
                                   </tbody>  
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5" class="child-td">
                                <table>
                                    <thead>
                                      @foreach($project_module as $feature_customize_category)
                                       @if($feature_customize_category->module_name =='feature_customize') 
                                        <tr class="add_new_column_customize">
                                            <th style="width: 40%"><span>Feature Customize</span></th>
                                          <input type="hidden" class="form-control" name="customize_module_name" value="feature_customize" />
                                            <th><input type="text" required class="form-control" name="customize_estimated_cost" value="{{$feature_customize_category->estimated_cost}}"/></th>
                                            <th><input type="text" required class="form-control" name="customize_actual_cost" value="{{$feature_customize_category->actual_cost}}"/></th>  
                                            <th><input type="text" required class="form-control" name="customize_quoted_cost" value="{{$feature_customize_category->quoted_cost}}"/></th>                                      
                                           <th style="width: 80px;"><button type="button" class="display-non btn add_customize_btn"><i class="ion-plus"></i></button></th>                  
                                        </tr>                                           
                                    </thead>
                                    <tbody class="add_customize_row">
                                    <?php $customize_sub_category = DB::table('project_cost_breakdowns')->join('project_cost_subcategories','project_cost_breakdowns.id','=','project_cost_subcategories.category_id')
                                                     ->select('project_cost_subcategories.*')
                                                     ->where('project_cost_subcategories.category_id',$feature_customize_category->id) 
                                                     ->get();                                                                  
                                     ?>  
                                    @if(isset($customize_sub_category))  
                                     @foreach($customize_sub_category as $customize) 
                                        <tr>                                            
                                            <td><input type="text" required class="form-control" name="customize_sub_category_name[]" value="{{$customize->sub_category_name}}" /></td>
                                            <td><input type="text" required class="form-control" name="mobile_module_name[]" value="{{$customize->sub_estimated_cost}}"/></td>
                                            <td><input type="text" required class="form-control" name="customize_sub_actual_cost[]" value="{{$customize->sub_actual_cost}}"/></td>
                                            <td><input type="text" required class="form-control" name="customize_sub_quoted_cos[]" value="{{$customize->sub_quoted_cost}}"/></td>                                            
                                        </tr>  
                                       @endforeach
                                     @endif 
                                    @endif  
                                  @endforeach
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr class="cost-total">
                            <td colspan="5" class="child-td">
                                <table>
                                    <thead>
                                        <tr class="add_new_column">                                           
                                             <th style="width: 40%"><span>Project Total</span></th>
                                            @for($i=0;$i<3;$i++)
                                              <th>{{$total_cost[$i]}}</th>
                                            @endfor  
                                            <th style="width: 80px;">&nbsp;</th>
                                            <th style="width: 80px;">&nbsp;</th>
                                        </tr>
                                    </thead>
                                </table>
                            </td>
                        </tr>

                    </tbody>                    
                </table>

          </form>
       @endif
        @if(sizeof($project_module)==0)         
           <form class="form-horizontal" id="example-1-form" method="POST"  action="{{ url( Request::path() ) }}">
            <input name="_token" type="hidden" value="{{ csrf_token() }}">

         <h2 class="page-heading lighter text-uppercase clearfix">PROJECT COST BREAKDOWN <button type="button" class="btn btn-stroke btn-black pull-right text-uppercase cost_edit_btn">Edit</button> <button type="submit" class="btn btn-stroke btn-black pull-right text-uppercase btn-success btn-submit-cost">SUBMIT</button></h2>

                <table class="table table-pricing-quote">
                    <thead>
                        <tr>
                            <th style="width: 40%">&nbsp;</th>
                            <th>Estimate Cost</th>
                            <th>Actual Cost</th>
                            <th>Price quoted</th>
                            <th style="width: 80px;">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="5" class="child-td">
                                <table>
                                    <thead>
                                        <tr class="add_new_column_design">
                                            <th style="width: 40%"><span>Design and Conceptualization</span></th>
                                            <input type="hidden" class="form-control" name="design_module_name" value="design_and_conceptualization" />
                                            <th><input type="text" required class="form-control" name="design_estimated_cost"/></th>
                                            <th><input type="text" required class="form-control" name="design_actual_cost"/></th>  
                                            <th><input type="text" required class="form-control" name="design_quoted_cost"/></th>
                                            <th style="width: 80px;"><button type="button" class="display-non btn add_design_btn"><i class="ion-plus"></i></button></th>                                           
                                        </tr>
                                    </thead>
                                    <tbody class="add_design_row">
                                        <tr>                                            
                                            <td><input type="text" required class="form-control" name="design_sub_category_name[]" value="Per Unique Page" /></td>
                                            <td><input type="text" required class="form-control" name="design_sub_estimated_cos[]"/></td>
                                            <td><input type="text" required class="form-control" name="design_sub_actual_cost[]"/></td>
                                            <td><input type="text" required class="form-control" name="design_sub_quoted_cos[]"/></td>
                                            <td style="width: 80px;"></td>                                            
                                        </tr>
                                        <tr>                                           
                                            <td><input type="text" required class="form-control" name="design_sub_category_name[]" value="Additional Page" /></td>
                                            <td><input type="text" required class="form-control" name="design_sub_estimated_cos[]"/></td>
                                            <td><input type="text" required class="form-control" name="design_sub_actual_cost[]" /></td>
                                            <td><input type="text" required class="form-control" name="design_sub_quoted_cos[]"/></td> 
                                            <td style="width: 80px;"></td>                                           
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5" class="child-td">
                                <table>
                                    <thead>
                                        <tr class="add_new_column_development">
                                            <th style="width: 40%"><span>Development</span></th>
                                            <input type="hidden" class="form-control" name="development_module_name" value="development" />
                                            <th><input type="text" required class="form-control" name="development_estimated_cost"/></th>
                                            <th><input type="text" required class="form-control" name="development_actual_cost"/></th>  
                                            <th><input type="text" required class="form-control" name="development_quoted_cost"/></th>
                                            <th style="width: 80px;"><button type="button" class=" display-non btn add_development_btn"><i class="ion-plus"></i></button></th>                                       
                                        </tr>
                                    </thead>
                                    <tbody class="add_development_row">                                        
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5" class="child-td">
                                <table>
                                    <thead>
                                        <tr class="add_new_column_mobile">
                                            <th style="width: 40%"><span>Mobile Responsive</span></th>
                                            <input type="hidden" class="form-control" name="mobile_module_name" value="mobile" />
                                            <th><input type="text" required class="form-control" name="mobile_estimated_cost"/></th>
                                            <th><input type="text" required class="form-control" name="mobile_actual_cost"/></th>  
                                            <th><input type="text" required class="form-control" name="mobile_quoted_cost"/></th>
                                            <th style="width: 80px;"><button type="button" class="display-non btn add_mobile_btn"><i class="ion-plus"></i></button></th>                                            
                                        </tr>
                                    </thead>
                                    <tbody class="add_mobile_row"></tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5" class="child-td">
                                <table>
                                    <thead>
                                        <tr class="add_new_column_hosting">
                                            <th style="width: 40%"><span>Hosting</span></th>
                                            <input type="hidden" class="form-control" name="hosting_module_name" value="hosting" />
                                            <th><input type="text" required class="form-control" name="hosting_estimated_cost"/></th>
                                            <th><input type="text" required class="form-control" name="hosting_actual_cost"/></th>  
                                            <th><input type="text" required class="form-control" name="hosting_quoted_cost"/></th>   
                                            <th style="width: 80px;"><button type="button" class="display-non btn add_hosting_btn"><i class="ion-plus"></i></button></th>                                 
                                        </tr>
                                    </thead>
                                    <tbody class="add_hosting_row"></tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5" class="child-td">
                                <table>
                                    <thead>
                                        <tr class="add_new_column_domain">
                                            <th style="width: 40%"><span>Domain Registration</span></th>
                                           <input type="hidden" class="form-control" name="domain_module_name" value="domain" />
                                            <th><input type="text" required class="form-control" name="domain_estimated_cost"/></th>
                                            <th><input type="text" required class="form-control" name="domain_actual_cost"/></th>  
                                            <th><input type="text" required class="form-control" name="domain_quoted_cost"/></th> 
                                            <th style="width: 80px;"><button type="button" class="display-non btn add_domain_btn"><i class="ion-plus"></i></button></th>                                     
                                        </tr>
                                    </thead>
                                    <tbody class="add_domain_row"></tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5" class="child-td">
                                <table>
                                    <thead>
                                        <tr class="add_new_column_plugin">
                                            <th style="width: 40%"><span>Plug-ins</span></th>
                                            <input type="hidden" class="form-control" name="plugins_module_name" value="plugins" />
                                            <th><input type="text" required class="form-control" name="plugins_estimated_cost"/></th>
                                            <th><input type="text" required class="form-control" name="plugins_actual_cost"/></th>  
                                            <th><input type="text" required class="form-control" name="plugins_quoted_cost"/></th>  
                                            <th style="width: 80px;"><button type="button" class="display-non btn add_plugin_btn"><i class="ion-plus"></i></button></th>                                         
                                        </tr>
                                    </thead>
                                    <tbody class="add_plugin_row">
                                        <tr>                                            
                                            <td><input type="text" required class="form-control" name="plugins_sub_category_name[]" value="Per Unique Page" /></td>
                                            <td><input type="text" required class="form-control" name="plugins_sub_estimated_cos[]"/></td>
                                            <td><input type="text" required class="form-control" name="plugins_sub_actual_cost[]"/></td>
                                            <td><input type="text" required class="form-control" name="plugins_sub_quoted_cos[]"/></td>    
                                        </tr>
                                        <tr>                                            
                                            <td><input type="text" required class="form-control" name="plugins_sub_category_name[]" value="Additional Page" /></td>
                                            <td><input type="text" required class="form-control" name="plugins_sub_estimated_cos[]"/></td>
                                            <td><input type="text" required class="form-control" name="plugins_sub_actual_cost[]"/></td>
                                            <td><input type="text" required class="form-control" name="plugins_sub_quoted_cos[]"/></td>    
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5" class="child-td">
                                <table>
                                    <thead>
                                        <tr class="add_new_column_customize">
                                            <th style="width: 40%"><span>Feature Customize</span></th>
                                          <input type="hidden" class="form-control" name="customize_module_name" value="feature_customize" />
                                            <th><input type="text" required class="form-control" name="customize_estimated_cost"/></th>
                                            <th><input type="text" required class="form-control" name="customize_actual_cost"/></th>  
                                            <th><input type="text" required class="form-control" name="customize_quoted_cost"/></th>   
                                            <th style="width: 80px;"><button type="button" class="display-non btn add_customize_btn"><i class="ion-plus"></i></button></th>                                   
                                        </tr>
                                    </thead>
                                    <tbody class="add_customize_row"></tbody>
                                </table>
                            </td>
                        </tr>                        
                    </tbody>
                </table>

          </form>
         @endif 
    
       @endif 


      @if(Auth::user()->user_name=='user2')   
           <h2 class="page-heading lighter text-uppercase clearfix">PROJECT COST BREAKDOWN</h2> 
                <table class="table table-pricing-quote">
                    <thead>
                        <tr>
                            <th style="width: 70%">&nbsp;</th>
                            <th>Price quoted</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="2" class="child-td">                             
                                 <table>
                                    <thead>                                     
                                      @foreach($project_module as $category)
                                        @if($category->module_name =='design_and_conceptualization')                                      
                                          <tr>
                                            <th style="width: 70%"><span> Design and Conceptualization</span></th>                                           
                                            <th>{{$category->quoted_cost}}</th>                                           
                                         </tr> 
                                    </thead>
                                    <tbody class="add_design_row">
                                    <?php $design_sub_category = DB::table('project_cost_breakdowns')->join('project_cost_subcategories','project_cost_breakdowns.id','=','project_cost_subcategories.category_id')
                                                                     ->select('project_cost_subcategories.*')
                                                                     ->where('project_cost_subcategories.category_id',$category->id) 
                                                                     ->get();                                                                  
                                     ?>  
                                    @if(isset($design_sub_category))  
                                     @foreach($design_sub_category as $design) 
                                        <tr> 
                                            <td>{{$design->sub_category_name}}</td>
                                            <td>{{$design->sub_quoted_cost}}</td> 
                                        </tr>   
                                       @endforeach
                                     @endif 
                                    @endif  
                                  @endforeach 
                                   </tbody>  
                                     
                                 </table>
                             
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="child-td">
                                <table>
                                    <thead>                              
                                     @foreach($project_module as $development_category)
                                      @if($development_category->module_name =='development')   
                                        <tr>
                                            <th style="width: 70%"><span>Development</span></th>                                           
                                            <th>{{$development_category->quoted_cost}}</th>                                       
                                        </tr>
                                    </thead>                                    
                                    <tbody class="add_development_row">                                        
                                   
                                      <?php $development_sub_category = DB::table('project_cost_breakdowns')->join('project_cost_subcategories','project_cost_breakdowns.id','=','project_cost_subcategories.category_id')
                                                                         ->select('project_cost_subcategories.*')
                                                                         ->where('project_cost_subcategories.category_id',$development_category->id) 
                                                                         ->get();                                                                  
                                     ?>  
                                    @if(isset($development_sub_category))  
                                     @foreach($development_sub_category as $development) 
                                        <tr>                                                
                                            <td>{{$development->sub_category_name}}</td>                                         
                                            <td>{{$development->sub_quoted_cost}}</td>                                            
                                        </tr>                                        
                                    
                                       @endforeach
                                     @endif 
                                    @endif  
                                  @endforeach 
                                   </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="child-td">
                                <table>
                                    <thead>
                                     @foreach($project_module as $mobile_category)
                                      @if($mobile_category->module_name =='mobile')   
                                        <tr class="add_new_column_mobile">
                                            <th style="width: 70%"><span>Mobile Responsive</span></th> 
                                            <th>{{$mobile_category->quoted_cost}}</th>                                              
                                        </tr>                                        
                                    </thead>
                                    <tbody class="add_mobile_row">
                                         <?php $mobile_sub_category = DB::table('project_cost_breakdowns')->join('project_cost_subcategories','project_cost_breakdowns.id','=','project_cost_subcategories.category_id')
                                                                     ->select('project_cost_subcategories.*')
                                                                     ->where('project_cost_subcategories.category_id',$mobile_category->id) 
                                                                     ->get();                                                                  
                                     ?>  
                                    @if(isset($mobile_sub_category))  
                                     @foreach($mobile_sub_category as $mobile) 
                                        <tr>                                            
                                            <td>{{$mobile->sub_category_name}}</td>
                                            <td>{{$mobile->sub_quoted_cost}}</td>                                            
                                        </tr>                                        
                                    
                                       @endforeach
                                     @endif 
                                    @endif  
                                  @endforeach
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="child-td">
                                <table>
                                    <thead>
                                      @foreach($project_module as $hosting_category)
                                       @if($hosting_category->module_name =='hosting')   
                                        <tr class="add_new_column_hosting">
                                            <th style="width: 70%"><span>Hosting</span></th> 
                                            <th>{{$hosting_category->quoted_cost}}</th>                                    
                                        </tr>                                        
                                    </thead>
                                    <tbody class="add_hosting_row">
                                    <?php $hosting_sub_category = DB::table('project_cost_breakdowns')->join('project_cost_subcategories','project_cost_breakdowns.id','=','project_cost_subcategories.category_id')
                                                             ->select('project_cost_subcategories.*')
                                                             ->where('project_cost_subcategories.category_id',$hosting_category->id) 
                                                             ->get();                                                                  
                                     ?>  
                                    @if(isset($hosting_sub_category))  
                                     @foreach($hosting_sub_category as $hosting) 
                                        <tr>                                            
                                            <td>{{$hosting->sub_category_name}}</td>
                                            <td>{{$hosting->sub_quoted_cost}}</td>                                            
                                        </tr>  
                                       @endforeach
                                     @endif 
                                    @endif  
                                  @endforeach

                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="child-td">
                                <table>
                                    <thead>
                                     @foreach($project_module as $domain_category)
                                       @if($domain_category->module_name =='domain')   
                                        <tr class="add_new_column_domain">
                                            <th style="width: 70%"><span>Domain Registration</span></th>
                                            <th>{{$domain_category->quoted_cost}}</th>                                      
                                        </tr>                                        
                                    </thead>
                                    <tbody class="add_domain_row">
                                        
                                     <?php $domain_sub_category = DB::table('project_cost_breakdowns')->join('project_cost_subcategories','project_cost_breakdowns.id','=','project_cost_subcategories.category_id')
                                                         ->select('project_cost_subcategories.*')
                                                         ->where('project_cost_subcategories.category_id',$domain_category->id) 
                                                         ->get();                                                                  
                                     ?>  
                                    @if(isset($domain_sub_category))  
                                     @foreach($domain_sub_category as $domain) 
                                        <tr>                                            
                                           <td>{{$domain->sub_category_name}}</td>
                                           <td>{{$domain->sub_quoted_cost}}</td>                                            
                                        </tr>  
                                       @endforeach
                                     @endif 
                                    @endif  
                                  @endforeach
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="child-td">
                                <table>
                                    <thead>
                                      @foreach($project_module as $plugins_category)
                                        @if($plugins_category->module_name =='plugins')     
                                        <tr class="add_new_column_plugin">                                          
                                            <th style="width: 70%"><span>Plug-ins</span></th>
                                            <th>{{$plugins_category->quoted_cost}}</th>                                           
                                        </tr>
                                       
                                    </thead>
                                     <?php $plugins_sub_category = DB::table('project_cost_breakdowns')->join('project_cost_subcategories','project_cost_breakdowns.id','=','project_cost_subcategories.category_id')
                                                                     ->select('project_cost_subcategories.*')
                                                                     ->where('project_cost_subcategories.category_id',$plugins_category->id) 
                                                                     ->get();                                                                  
                                      ?>  
                                    <tbody class="add_plugin_row">  
                                     @if(isset($plugins_sub_category))  
                                       @foreach($plugins_sub_category as $plugins_sub) 
                                        <tr>                                            
                                            <td>{{$plugins_sub->sub_category_name}}</td>
                                            <td>{{$plugins_sub->sub_quoted_cost}}</td>    
                                        </tr>                                      
                                   
                                      @endforeach
                                     @endif 
                                    @endif  
                                  @endforeach   
                                   </tbody>  
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="child-td">
                                <table>
                                    <thead>
                                      @foreach($project_module as $feature_customize_category)
                                       @if($feature_customize_category->module_name =='feature_customize') 
                                        <tr class="add_new_column_customize">
                                            <th style="width: 70%"><span>Feature Customize</span></th>
                                            <th>{{$feature_customize_category->quoted_cost}}</th>                                      
                                        </tr>                                           
                                    </thead>
                                    <tbody class="add_customize_row">
                                    <?php $customize_sub_category = DB::table('project_cost_breakdowns')->join('project_cost_subcategories','project_cost_breakdowns.id','=','project_cost_subcategories.category_id')
                                                     ->select('project_cost_subcategories.*')
                                                     ->where('project_cost_subcategories.category_id',$feature_customize_category->id) 
                                                     ->get();                                                                  
                                     ?>  
                                    @if(isset($customize_sub_category))  
                                     @foreach($customize_sub_category as $customize) 
                                        <tr>                                            
                                           <td>{{$customize->sub_category_name}}</td>
                                            <td>{{$customize->sub_quoted_cost}}</td>                                            
                                        </tr>  
                                       @endforeach
                                     @endif 
                                    @endif  
                                  @endforeach
                                    </tbody>
                                </table>
                            </td>
                        </tr>                       
                         <tr class="cost-total">
                            <td colspan="2" class="child-td">
                                <table>
                                    <thead>
                                        <tr class="add_new_column">                                           
                                             <th style="width: 70%"><span>Project Total</span></th>                                          
                                             <th>{{$total_cost[2]}}</th>                                          
                                           
                                        </tr>
                                    </thead>
                                </table>
                            </td>
                        </tr>

                    </tbody>                    
                </table>
       @endif

            </div>

        </section> 


  
