	<footer class="footer">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="copy-info text-center">
						Copyright 2015 <strong>Top3 Media</strong>. All Rights Reserved.
					</div>
				</div>
			</div>
		</div>
	</footer>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>       
        
    <script type="text/javascript">
       $(document).ready(function(){
         $('.project_title_dropdown').change(function(){
            var project_id = $(this).val();          
             $.ajax({
                    type:"post",
                    url:"{{url('/search_project_for_quotation')}}",
                    data:{project_id:project_id},
                    cache:false,
					dataType: "json",
                    success:function(returnProjectData)
                     { var i=0;
                        $("#project_type").empty();

                         $.each(returnProjectData.project_info, function(index,projects) {                           
                             var project_type ='<option value="'+projects.id+'">'+projects.name+'</option>';
							$("#project_type").append(project_type);
							$("#project_timeline").val(projects.awarded_to);  
                            $("#invision_lik").val(projects.invision_lik); 	
							$("#invision_password").val(projects.invision_password); 
							$("#other_note").val(projects.other_note);	
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
  
    </body>
</html>
