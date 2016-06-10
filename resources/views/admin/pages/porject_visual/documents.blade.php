<div class="wagon wagon-project mt-50">
    <div class="wagon-body">
        <div class="form-group">
            <div class="col-sm-4">
                <div class="label-grouped">
                    <label>UPLOAD RELATED documents</label>
                     <p>
                       @if(isset($look_and_fell->related_documents)) {{$look_and_fell->related_documents}} @endif  
                    </p>
                </div>
            </div>                                
            <div class="col-sm-8">
                <div class="row">
                    <div class="col-xs-6"> 
                        <div class="upload-file no-btn wrapper_file">
                            <div class="up-field has-input-file file-parent-div">
                                <input type="file" class="more_file" name="related_documents[]" >
                                <span class="show_file_name"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6">                        
                        <a href="#" class="add-more-file"> 
                            <i class="fa fa-plus-circle"></i> &nbsp;&nbsp;Add more Files
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-4">
                <div class="label-grouped">
                    <label>Preferred font</label> 
                    <p>
                        @if(isset($look_and_fell->preferend_fonts)) {{$look_and_fell->preferend_fonts}} @endif  
                    </p>
                </div>
            </div>                                
            <div class="col-sm-8">
                <div class="row">
                    <div class="col-xs-6">
                        <ul class="list-unstyled fonts-list">
                            <li><a href="https://www.google.com/fonts" target="_blank">https://www.google.com/fonts</a></li>
                        </ul>    
                    </div>
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="preffered-font">

                                @if(isset($look_feel_fonts))
                                   @foreach($look_feel_fonts as $feel_fonts)
                                      <div class="input-hold wrapper">        
                                        <input type="text" class="form-control" name="preffered_fonts[]" value="{{$feel_fonts->preffered_fonts}}">
                                      </div>
                                   @endforeach
                                 @else
                                      <div class="input-hold wrapper">        
                                        <input type="text" class="form-control" name="preffered_fonts[]">
                                      </div>                                    
                                @endif 
                                </div>
                            </div>
                            <div class="col-xs-6">   
                                <a href="#" class="add_field_button">                           
                                    <i class="fa fa-plus-circle"></i> &nbsp;&nbsp;Add more Files
                                </a>    
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-4">
                <div class="label-grouped">
                    <label>PREFERRED COLORS</label>
                     <p>
                        @if(isset($look_and_fell->prefers_color)) {{$look_and_fell->prefers_color}} @endif  
                    </p>
                </div>
            </div>                                
            <div class="col-sm-8">
                <div class="row">
                    <div class="col-xs-6 col-xxs-12">
                        <div class="color-pic-container color-pic-container-1 relative">
                            <input id="color_pic_1" class="form-control color-field color-pic" name="preferred_color_1" value="@if(old('preferred_color_1')){{old('preferred_color_1')}}@elseif (isset($projectvisual)){{ $projectvisual->preferred_color_1 }}@endif">
                            <span class="validator_output">{{ $errors->first('preferred_color_1') }}</span>
                        </div>
                        
                    </div>
                    <div class="col-xs-6 col-xxs-12">
                        <div class="color-pic-container color-pic-container-2 relative">
                            <input id="color_pic_2" class="form-control color-field color-pic" name="preferred_color_2" value="@if(old('preferred_color_2')){{old('preferred_color_2')}}@elseif (isset($projectvisual)){{ $projectvisual->preferred_color_2 }}@endif">
                            <span class="validator_output">{{ $errors->first('preferred_color_2') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>


<script type="text/javascript">
    $(document).ready(function() {   
    var wrapper         = $(".preffered-font"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        
            $(wrapper).append('<div class="input-hold"><input type="text" class="form-control" id="preffered_fonts[]" name="preffered_fonts[]"/><a href="#" class="remove_field">&times;</a></div>'); //add input box
       
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove();
    })
  });
</script>

<!--add more file add -->
<script type="text/javascript">
    $(document).ready(function() {   
    var wrapper         = $(".preffered-font"); //Fields wrapper
    var add_button      = $(".add-more-file"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        $('.wrapper_file').append('<div class="up-field has-input-file file-parent-div"><input type="file" id="related_documents[]" name="related_documents[]" class="more_file"><span class="show_file_name"></span><a href="#" class="remove_field">&times;</a></div></div>'); //add input box
       
    });
    
    $('.wrapper_file').on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove();
    })
  });
</script>

<script type="text/javascript">
  $(document).on('change', '.more_file', function(){ 

    var file_url = $(this).val();
    var file_name = file_url.substr(file_url.lastIndexOf('\\') + 1);
   
    $(this).closest('.file-parent-div').find('.show_file_name').html(file_name);
  });
</script>
