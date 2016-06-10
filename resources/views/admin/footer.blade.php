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

    @section('footer_scripts')
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="{{ URL::asset('plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>

        <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ URL::asset('plugins/browserclass.js') }}"></script>
        <script src="{{ URL::asset('plugins/bootstrap-datetimepicker/moment.min.js') }}"></script>
        <script src="{{ URL::asset('plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
        <script src="{{ URL::asset('js/script.js') }}"></script>
    @show
    </body>
    <script src="{{ URL::asset('js/jquery.are-you-sure.js') }}"></script>
    <script src="{{ URL::asset('js/ays-beforeunload-shim.js') }}"></script>

<!--for upload -->
    <script src="http://hayageek.github.io/jQuery-Upload-File/4.0.10/jquery.uploadfile.min.js"></script>
    
    <script type="text/javascript">
      /*
            $("#sequentialupload").uploadFile({
                
                url:"http://localhost:8000/add_related_documents",
                fileName:"myfile",
                sequential:true,
                sequentialCount:1,
                onSuccess:function(files,data,xhr,pd)
                    {
                     var appenddomscr= '<input type="hidden" value="'+data+'" name="hidden_array_upload[]"/>';
                       $('.filecontainer').append(appenddomscr);
                    }   
                }); 

            $(".add_related_file").click(function(){
               var allimage = $('input[name="hidden_array_upload[]"]').map(function () {
                    return this.value;
                }).get().join(",");

               alert(allimage);
                
            });*/
       </script> 

<!-- end upload -->




    <script>
        $(document).ready(function(){    
            $('#example-1-form').areYouSure();
        });
    </script>
    <!--Delete Confirmation-->    
   <script type="text/javascript">    
     function confarmation()
       {
        var r=confirm("Are you sure to delete this?");
        if (r==true)
           {        
           return true;       
           }
        else
          {
            return false;       
          }
       }  
   </script>

</html>
