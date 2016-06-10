<section class="section section-project-featured">
    <div class="container">
        <h2 class="lighter uppercase page-heading text-center">Project  FEATURES</h2>

        <div class="form-group mb-30">
            <label class="col-sm-4 control-label label-left-upp white">
                number of unique pages for your website
            </label>
            <div class="col-sm-3">
                <input type="text" class="form-control unique_page_no">
            </div>
        </div>

        <h5 class="bold uppercase white pl-30">ENTER THE DETAILS BELOW:</h5>
        <div class="pdetail-box">
            <table class="table">
                <thead>
                    <tr>
                        <th>PAGE #</th>
                        <th>PAGE NAME</th>
                        <th>PAGE FEATURE / Requirements</th>
                        <th>EXTRA NOTES</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody class="dynamic_rows"> 
                 <?php $j=1;?>              
                 @if(isset($project_features))
                    @foreach($project_features as $p_features)
                     <tr>
                        <td><?php echo $j++;?></td>
                        <td><input type="text" class="form-control" name="page_name[]" value="{{$p_features->page_name}}"></td>
                        <td>
                            <select name="page_requirements[]" class="form-control select-styled">
                               <option value="{{$p_features->page_requirements}}">{{$p_features->page_requirements}}</option>
                               <option value="About Us">About Us</option>
                               <option value="Contact Us">Contact Us</option>
                            </select>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="extra_notes[]" value="{{$p_features->extra_notes}}">
                        </td>
                        <td>
                            <div class="input-group input-group-eql">                              
                                <span class="input-group-btn">
                                    <button class="btn btn-minus" type="button"><i class="fa fa-minus remove_row"></i></button>
                                </span>
                            </div>
                        </td>
                     </tr> 
                   @endforeach
                   @else                 
                    <tr>
                        <td>1</td>
                        <td><input type="text" class="form-control" name="page_name[]"></td>
                        <td>
                            <select name="page_requirements[]" class="form-control select-styled">
                               <option>About Us</option>
                               <option>Contact Us</option>
                            </select>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="extra_notes[]">
                        </td>
                        <td>
                            <div class="input-group input-group-eql">                              
                                <span class="input-group-btn">
                                    <button class="btn btn-minus" type="button"><i class="fa fa-minus remove_row"></i></button>
                                </span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td><input type="text" class="form-control" name="page_name[]"></td>
                        <td>
                            <select name="page_requirements[]" class="form-control select-styled">
                                <option>About Us</option>
                                <option>Contact Us</option>
                            </select>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="extra_notes[]">
                        </td>
                        <td>
                            <div class="input-group input-group-eql">                               
                                <span class="input-group-btn">
                                    <button class="btn btn-minus" type="button"><i class="fa fa-minus remove_row"></i></button>
                                </span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td><input type="text" class="form-control" name="page_name[]"></td>
                        <td>
                            <select name="page_requirements[]" class="form-control select-styled">
                               <option>About Us</option>
                               <option>Contact Us</option>
                            </select>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="extra_notes[]">
                        </td>
                        <td>
                            <div class="input-group input-group-eql">
                                <span class="input-group-btn">
                                    <button class="btn btn-minus" type="button"><i class="fa fa-minus remove_row"></i></button>
                                </span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td><input type="text" class="form-control" name="page_name[]"></td>
                        <td>
                            <select name="page_requirements[]" class="form-control select-styled">
                               <option>About Us</option>
                               <option>Contact Us</option>
                            </select>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="extra_notes[]">
                        </td>
                        <td>
                            <div class="input-group input-group-eql">                               
                                <span class="input-group-btn">
                                    <button class="btn btn-minus" type="button"><i class="fa fa-minus remove_row"></i></button>
                                </span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td><input type="text" class="form-control" name="page_name[]"></td>
                        <td>
                            <select name="page_requirements[]" class="form-control select-styled">
                               <option>About Us</option>
                               <option>Contact Us</option>
                            </select>
                        </td>
                        <td>
                             <input type="text" class="form-control" name="extra_notes[]">
                        </td>     
                        <td>                                                      
                                <span class="input-group-btn">
                                    <button class="btn btn-minus" type="button"><i class="fa fa-minus remove_row"></i></button>
                                </span>
                           
                        </td>
                    </tr>
                  @endif
                </tbody>
            </table>
        </div>
    </div>
</section>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>


  <script type="text/javascript">
    $(document).ready(function(){  
      $('.unique_page_no').keyup(function(){

        var page_no = $(this).val();

        $('.dynamic_rows').empty();

     for (i = 1; i<=page_no; i++) {  

           $('.dynamic_rows').append('<tr><td>'+i+'</td><td><input type="text" class="form-control" name="page_name[]"/></td><td><select name="page_requirements[]" class="form-control select-styled"><option>About Us</option><option>Contact Us</option></select></td><td><input type="text" class="form-control" name="extra_notes[]"/></td><td><button class="btn btn-minus" type="button"><i class="fa fa-minus"></i></button></td></tr>')   ;     
        }

      }) ;
    });
  </script>

  <script type="text/javascript">
    $(document).ready(function(){  
      $('.remove_row').click(function(){
        $(this).closest("tr").remove(); 
      }) ;
    });
  </script>