
  <div class="upload-doc-panel">
    <div class="row">
        <div class="col-sm-4">
            <div class="upload-heading">
                <h4 class="title">Upload Pre-signed Proposal</h4>
                <p>
                    Etiam porta sem malesuada magna mollis euismod. 
                </p>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="upload-doc-up mt-20">
                <div class="uploaded-filebar"> filenameloremipsum.doc
                
                </div>
            </div>
        </div>
    </div>
</div>

<?php //dd($project_oppertunity);?>

<div class="uploaded-doc-panel mt-40">
    <div class="row">
        <div class="col-sm-4">
            <div class="exe-project">
                <div class="exe-icon">                                    
                   <?php
                      if(isset($project_oppertunity->presigned_proposal))
                        { $file_name = explode('/',$project_oppertunity->presigned_proposal);
                          $doc_pdf =  end($file_name);
                          //echo $doc_pdf;
                         }
                      else{                             
                            echo '<div class="file-name">FILENAME.DOC</div>';
                          }   
                   ?>

                   @if(isset($project_oppertunity->presigned_proposal))                        
                      <a href="{{url('/').'/'.$project_oppertunity->presigned_proposal}}"><img alt="Doc" src="{{url('/')}}/images/icon/doc.png"> </a> @endif
                </div>
                <div class="exe-desc">
                    <div class="file-name">@if(isset($doc_pdf)){{$doc_pdf}}@endif</div>
                    <span class="up-date">@if(isset($project_oppertunity->date)){{$project_oppertunity->date}}@endif</span>
                </div>
            </div>
        </div>
                  <span align="center" class="succes_msg"></span>
        <div class="col-sm-8">
            <div class="approve-status">
                <div class="propo-update">
                    Pre-signed proposal uploaded by <a href="">{{Auth::user()->user_name}}</a> on <a href="">@if(isset($project_oppertunity->date)){{$project_oppertunity->date}}@endif</a>
                </div>
                <div class="upload-doc-up">
                   @if(Auth::user()->user_name=='user1')
                      <button type="button" class="btn btn-primary btn-stroke btn-has-icon bold text-uppercase approve_proposal_btn">
                        <span class="bicon succees_sign">X</span>
                        <span class="btext">APPROVE PROPOSAL</span>                    
                      </button>
                   @endif    
                </div>
            </div>            
        </div>
    </div>
</div>


<div class="upload-doc-panel mt-40">
    <div class="row">
        <div class="col-sm-4">
            <div class="upload-heading">
                <h4 class="title">Upload Pre-signed Proposal</h4>
                <p>
                    Etiam porta sem malesuada magna mollis euismod.  
                    <input type="file" name="presigned_proposal">
                </p>
                 
            </div>
        </div>
        <div class="col-sm-8">
            <div class="upload-doc-up mt-20">
                <div class="upload-file">
                    <div class="up-field"></div>
                    <span class="up-btn btn btn-black bold">Upload File</span>                    
                </div>
            </div>
        </div>
    </div>
</div>

@if(isset($project_oppertunity->project_id))

  <script type="text/javascript">
    $(document).ready(function(){  
      $('.approve_proposal_btn').click(function(){
        //alert('fdklg');
          var project_id = <?php echo $project_oppertunity->project_id;?>;
          $.ajax({
                type: "POST",
                url: "{{url('/approve_proposal')}}",
                data: { project_id:project_id },
                cache: false,
                success: function(returnStatusData){                  
                      $('.succes_msg').addClass('alert alert-success')                                  
                                      .text('Successfully Approved Project Proposal')
                                      .delay('4000').fadeOut('100');

                      $('.succees_sign').empty();
                      $('.succees_sign').append('<i class="fa fa-check"></i>');
                    } 
              

       });     
      });
    });
  </script>
@endif     

