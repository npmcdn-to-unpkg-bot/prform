@if(Auth::user()->type=='admin')
	@if(empty($project_oppertunity->presigned_proposal)) 
		<div class="upload-doc-panel mt-40 hidde_after_upload">
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
					<div class="upload-doc-up has-inpfile mt-20">
						<div class="upload-file">
							<div class="up-field">
								<span class="show_presiged_file_name"></span>
							</div>
							<span class="up-btn btn btn-black bold">Upload File</span>
						</div>
						<input type="file" required id="presign_proposal" class="add_presiged_file" name="presigned_proposal">
					</div>
					
				</div>
			</div>
		</div> 
	  @else
    
     <?php
		  if(isset($project_oppertunity->presigned_proposal))
			{ $file_name = explode('/',$project_oppertunity->presigned_proposal);
			  $doc_pdf =  end($file_name);
			  //echo $doc_pdf;
			 }
		  else{                             
				///echo '<div class="file-name">FILENAME.DOC</div>';
			  }  
          if(isset($project_oppertunity->signed_proposal))
			{ $file_name_signed = explode('/',$project_oppertunity->signed_proposal);
			  $doc_pdf_signed =  end($file_name_signed);
			  //echo $doc_pdf;
			 }
		  else{                             
				//echo '<div class="file-name">FILENAME.DOC</div>';
			  }   			  
	 ?> 
	
	  
       @if($project_oppertunity->status=='')
	    <div class="upload-doc-panel mt-40 hidde_after_upload">
			<div class="row">
				<div class="col-sm-4">
					<div class="upload-heading">
						<h4 class="title">Upload Pre-signed Proposal dfgh</h4>
						<p>
							Etiam porta sem malesuada magna mollis euismod. 
						</p>
						 
					</div>
				</div>
				<div class="col-sm-8">          
					<div class="upload-doc-up has-inpfile mt-20">
						<div class="upload-file">
							<div class="up-field">
								@if(isset($doc_pdf)){{$doc_pdf}}@endif
							</div>
							<span class="up-btn btn btn-black bold"></span>
						</div>						
					</div>
					
				</div>
			</div>
		 </div>
	
		<div class="uploaded-doc-panel mt-40">    
		  <div class="row">	     
			  <div class="col-sm-4">              
				 <div class="exe-project">
					<div class="exe-icon">
					   @if(isset($project_oppertunity->presigned_proposal))                        
						  <a href="{{url('/').'/'.$project_oppertunity->presigned_proposal}}"><img alt="Doc" src="{{url('/')}}/images/icon/doc.png"> </a> 
					   @endif    
					</div>
					<div class="exe-desc">
						<div class="file-name"><a href="{{url('/').'/'.$project_oppertunity->presigned_proposal}}">@if(isset($doc_pdf)){{$doc_pdf}}@endif</a></div>
						<span class="up-date">@if(isset($project_oppertunity->date)){{$project_oppertunity->date}}@endif</span>
					</div>
				  </div>		   
			  </div>
              <div class="col-sm-8">
				<div class="approve-status">
                <div class="propo-update">
                    Pre-signed proposal uploaded by <a href="">@if(isset($current_project->user_name)){{$current_project->user_name}} @endif</a> on <a href="">@if(isset($project_oppertunity->date)){{$project_oppertunity->date}}@endif</a>
                </div>
                <div class="upload-doc-up">
                   @if(Auth::user()->type=='admin')
                      <button type="button" class="btn btn-primary btn-stroke btn-has-icon bold text-uppercase approve_proposal_btn">
                        @if(isset($project_oppertunity->status) && $project_oppertunity->status==1)<span class="bicon succees_sign approved_text_color"><i class="fa fa-check"></i></span>
						  <span class="btext approved_text_color">PRE-PPROPOSAL APPROVED </span>
						@else							
							<span class="bicon">X</span> 
						    <span class="btext">APPROVE PROPOSAL</span> 
						@endif                                       
                      </button>
                   @endif    
                  </div>
              </div>        		  
			<span align="center" class="succes_msg"></span>       
		  </div>
		</div>	
      </div>

     @endif	
     @if($project_oppertunity->status=='1')	

      <div class="uploaded-doc-panel mt-40"> 
			<div class="row">
				<div class="col-sm-4">
					<div class="upload-heading">
						<h4 class="title">Pre-signed Proposal</h4>
						<p>
							Etiam porta sem malesuada magna mollis euismod. 
						</p>
					</div>
				</div>
				<div class="col-sm-8">
					<div class="upload-doc-up mt-20">
						<div class="uploaded-filebar uploaded">
							@if(isset($doc_pdf)){{$doc_pdf}}@endif
						</div>
					</div>
					<div class="mt-20">
						<button class="btn btn-primary btn-has-icon bold text-uppercase">
							@if(isset($project_oppertunity->status) && $project_oppertunity->status==1)<span class="bicon succees_sign approved_text_color"><i class="fa fa-check"></i></span>
							  <span class="btext approved_text_color">APPROVE PROPOSAL</span>
							@endif 
						</button>
						<span class="pl-30">
							Pre-signed proposal approved by <a href="">@if(isset($current_project->user_name)){{$current_project->user_name}} @endif</a> on <a href="">@if(isset($project_oppertunity->date)){{$project_oppertunity->date}}@endif</a>
						</span>
					</div>
				</div>
			</div>
		</div>		
		<div class="upload-doc-panel mt-40">
			<div class="row">
				<div class="col-sm-4">
					<div class="upload-heading">
						<h4 class="title">Signed Proposal</h4>
						<p>
							Etiam porta sem malesuada magna mollis euismod. 
						</p>
					</div>
				</div>
				<div class="col-sm-8">
					<div class="upload-doc-up mt-20">
						<div class="uploaded-filebar uploaded">
							<span class="show_siged_file_name">@if(isset($doc_pdf_signed)){{$doc_pdf_signed}}@endif</span> &nbsp; 
						</div>
					</div>
					<div class="pull-right mt-10">
						<div class="btn-upload-hold">
						 @if(isset($project_oppertunity->signed_proposal))
							<button class="btn btn-black btn-block uppercase bold">REUPLOAD FILE</button>
						 @else
							<button class="btn btn-black btn-block uppercase bold">UPLOAD FILE</button> 
						 @endif 
							<input type="file" id="signed_proposal" class="signed_proposal" name="signed_proposal">
						</div>
					</div>
				</div>
			</div>
		</div>
 
     @if(isset($project_oppertunity->signed_proposal) && !empty($project_oppertunity->signed_proposal))  
		<div class="uploaded-doc-panel mt-40">    
		  <div class="row">	     
			  <div class="col-sm-4">              
				 <div class="exe-project">
					<div class="exe-icon">
					   @if(isset($project_oppertunity->signed_proposal))                        
						  <a href="{{url('/').'/'.$project_oppertunity->signed_proposal}}"><img alt="Doc" src="{{url('/')}}/images/icon/doc.png"> </a> 
					   @endif    
					</div>
					<div class="exe-desc">
						<div class="file-name"><a href="{{url('/').'/'.$project_oppertunity->signed_proposal}}">@if(isset($doc_pdf_signed)){{$doc_pdf_signed}}@endif</a></div>
						<span class="up-date">@if(isset($project_oppertunity->date)){{$project_oppertunity->date}}@endif</span>
					</div>
				  </div>		   
			  </div>
              <div class="col-sm-8">
				<div class="approve-status">
                <div class="propo-update">
                    Signed proposal uploaded by <a href="">@if(isset($current_project->user_name)){{$current_project->user_name}} @endif</a> on <a href="">@if(isset($project_oppertunity->date)){{$project_oppertunity->date}}@endif</a>
                </div>                
              </div>
		  </div>
		</div>	
      </div> 

      @endif
    @endif 
  @endif	 
@endif
   
   <!-- start user 2 -->
   
  <?php
	  if(isset($project_oppertunity->presigned_proposal))
		{ $file_name = explode('/',$project_oppertunity->presigned_proposal);
		  $doc_pdf =  end($file_name);
		  //echo $doc_pdf;
		 }
	  else{                             
			///echo '<div class="file-name">FILENAME.DOC</div>';
		  }  
      if(isset($project_oppertunity->signed_proposal))
		{ $file_name_signed = explode('/',$project_oppertunity->signed_proposal);
		  $doc_pdf_signed =  end($file_name_signed);
		  //echo $doc_pdf;
		 }
	  else{                             
			//echo '<div class="file-name">FILENAME.DOC</div>';
		  }   			  
   ?> 
   
   @if(Auth::user()->type=='admin2')
	 @if(empty($project_oppertunity->presigned_proposal)) 
		<div class="upload-doc-panel mt-40 hidde_after_upload">
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
					<div class="upload-doc-up has-inpfile mt-20">
						<div class="upload-file">
							<div class="up-field">
								<span class="show_presiged_file_name"></span>
							</div>
							<span class="up-btn btn btn-black bold">Upload File</span>
						</div>
						<input type="file" required id="presign_proposal" class="add_presiged_file" name="presigned_proposal">
					</div>
					
				</div>
			</div>
		</div> 
	  @else
		 @if($project_oppertunity->status=='')
		 
	      <div class="upload-doc-panel mt-40 hidde_after_upload">
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
					<div class="upload-doc-up has-inpfile mt-20">
						<div class="upload-file">
							<div class="up-field">
								@if(isset($doc_pdf)){{$doc_pdf}}@endif
							</div>
							<span class="up-btn btn bold"></span>
						</div>						
					</div>					
				</div>
			</div>
		</div>
	 @endif	
	@if(isset($project_oppertunity->status) && $project_oppertunity->status==1)			
      <div class="uploaded-doc-panel mt-40"> 
			<div class="row">
				<div class="col-sm-4">
					<div class="upload-heading">
						<h4 class="title">Pre-signed Proposal</h4>
						<p>
							Etiam porta sem malesuada magna mollis euismod. 
						</p>
					</div>
				</div>
				<div class="col-sm-8">
					<div class="upload-doc-up mt-20">
						<div class="uploaded-filebar uploaded">
							@if(isset($doc_pdf)){{$doc_pdf}}@endif
						</div>
					</div>
					<div class="mt-20">
						<button type="button" class="btn btn-primary btn-has-icon bold text-uppercase">
							@if(isset($project_oppertunity->status) && $project_oppertunity->status==1)<span class="bicon approved_text_color"><i class="fa fa-check"></i></span>
							  <span class="btext approved_text_color">PRE-PPROPOSAL APPROVED</span>
							@endif 
						</button>
						<span class="pl-30">
							Pre-signed proposal approved by <a href="">@if(isset($current_project->user_name)) user1 @endif</a> on <a href="">@if(isset($project_oppertunity->date)){{$project_oppertunity->date}}@endif</a>
						</span>
					</div>
				</div>
			</div>
		</div>		
		<div class="upload-doc-panel mt-40">
			<div class="row">
				<div class="col-sm-4">
					<div class="upload-heading">
						<h4 class="title">Signed Proposal</h4>
						<p>
							Etiam porta sem malesuada magna mollis euismod. 
						</p>
					</div>
				</div>
				<div class="col-sm-8">
					<div class="upload-doc-up mt-20">
						<div class="uploaded-filebar uploaded">
							<span class="show_siged_file_name">@if(isset($doc_pdf_signed)){{$doc_pdf_signed}}@endif</span> &nbsp; 
						</div>
					</div>
					<div class="pull-right mt-10">
						<div class="btn-upload-hold">						
							<input type="file" id="signed_proposal" class="signed_proposal" name="signed_proposal">
						</div>
					</div>
				</div>
			</div>
		</div>
 
     @if(isset($project_oppertunity->signed_proposal) && !empty($project_oppertunity->signed_proposal))  
		<div class="uploaded-doc-panel mt-40">    
		  <div class="row">	     
			  <div class="col-sm-4">              
				 <div class="exe-project">
					<div class="exe-icon">
					   @if(isset($project_oppertunity->signed_proposal))                        
						  <a href="{{url('/').'/'.$project_oppertunity->signed_proposal}}"><img alt="Doc" src="{{url('/')}}/images/icon/doc.png"> </a> 
					   @endif    
					</div>
					<div class="exe-desc">
						<div class="file-name"><a href="{{url('/').'/'.$project_oppertunity->signed_proposal}}">@if(isset($doc_pdf_signed)){{$doc_pdf_signed}}@endif</a></div>
						<span class="up-date">@if(isset($project_oppertunity->date)){{$project_oppertunity->date}}@endif</span>
					</div>
				  </div>		   
			  </div>
              <div class="col-sm-8">
				<div class="approve-status">
                <div class="propo-update">
                    Signed proposal uploaded by <a href="">@if(isset($current_project->user_name)){{$current_project->user_name}} @endif</a> on <a href="">@if(isset($project_oppertunity->date)){{$project_oppertunity->date}}@endif</a>
                </div>                
              </div>
		  </div>
		</div>	
      </div> 

      @endif
     @endif	  	  
	@endif	 
   @endif

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

	<script type="text/javascript">
	  $(document).on('change', '.add_presiged_file', function(){ 

		var file_url = $(this).val();
		var file_name = file_url.substr(file_url.lastIndexOf('\\') + 1);	
	   
		$(".show_presiged_file_name").html(file_name);
	  });
	</script> 
	
	<script type="text/javascript">
	  $(document).on('change', '.signed_proposal', function(){ 

		var file_url = $(this).val();
		var file_name = file_url.substr(file_url.lastIndexOf('\\') + 1);	
	   
		$(".show_siged_file_name").empty();
		$(".show_siged_file_name").html(file_name);
	  });
	</script> 
	
	<style>
	    .approved_text_color{
			                  color:#ffffff;
							  background:rgb(23,166,137);
		                    }
		
	</style>

