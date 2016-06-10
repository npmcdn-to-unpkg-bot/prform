
<section class="section-upload-doc">
    <div class="container">
        <div class="upload-doc-panel">
            <div class="row">
                <div class="col-sm-4">
                    <div class="upload-heading">
                        <h4 class="title">Upload Related Documents</h4>
                        <p>
                            Etiam porta sem malesuada magna mollis euismod. 
                        </p>
                    </div>
                </div>

                <div class="col-sm-8">
                  <form class="form-horizontal" id="example-1-form" method="POST" enctype="multipart/form-data">
                   <input name="_token" type="hidden" value="{{ csrf_token() }}">
                    
                @if(isset($proposal_no))<div id="fileuploader">Upload</div> @endif

                    <div class="filecontainer"></div>                

                  </form>    
                </div>
            </div>
        </div>


        <link href="http://hayageek.github.io/jQuery-Upload-File/4.0.10/uploadfile.css" rel="stylesheet">

@if(isset($proposal_no))

 <script>
    $(document).ready(function()
     { 
        $("#fileuploader").uploadFile({
            
           // $("#sequentialupload").uploadFile({
                
                url:"{{url('/add_related_documents/'.$proposal_no)}}",
                fileName:"myfile",
                sequential:true,
                sequentialCount:1,
                onSuccess:function(files,data,xhr,pd)
                    {
                     var appenddomscr= '<input type="hidden" value="'+data+'" name="hidden_array_upload[]"/>';
                       $('.filecontainer').append(appenddomscr);
                    } 

                   alert('Successfully Uploaded Your Documents');

                }); 

    });
</script>



   <?php

      $related_documents = DB::table('related_documentss')->join('projects','projects.id','=','related_documentss.project_id')
                                                ->select('related_documentss.*')
                                                ->where('proposal_no',$proposal_no)
                                                ->get(); 
      //dd($related_documents) ;                                          
    ?>   



   
   <div class="row">
    @foreach($related_documents as $documents)  

     <?php 
         $total_link = explode('/',$documents->file_name);
         $only_img_link = end($total_link);
     ?>
        <div class="col-sm-3">
            <div class="exe-project">
                <div class="exe-icon"> 
                    <img src="{{url('/')}}/{{$documents->file_name}}" alt="Doc" width="47" height="59" >
                </div>
                <div class="exe-desc">
                    <h4 calss="title">Project Proposal</h4>
                    <div class="file-name">{{$only_img_link}}</div>
                    <span class="up-date">Uploaded {{date('d/m/Y',strtotime($documents->created_at))}}</span>
                </div>
            </div>
        </div> 
    @endforeach  

      </div>
  @endif             
    </div>
</section>