<div class="table-responsive mt-60">
    <meta name="request_url" content="{{ url( Request::path() ) }}">
    <table id="employee-grid" cellspacing="0" width="100%" class="display table table-dash">
        <thead>
            <tr>
                <th>Project Name</th>               
                <th>Awarded To</th>
                <th>Invision Link</th>
                <th>Demo Link</th>   
                <th>Live Link</th>                           
                <th>Action</th>
            </tr>
        </thead>

        <tbody class="table-data-user">
          @if($allprojectcodings)
              @foreach($allprojectcodings as $project_coding) 
                <tr>
                    <td>{{$project_coding->project_title}}</td>
                    <td>{{$project_coding->awarded_to}}</td>
                    <td>{{$project_coding->invision_lik}}</td>
                    <td>{{$project_coding->demo_link}}</td>
                    <td>{{$project_coding->live_lik}}</td>                                   
                    <td>
                        <a href="{{url('/porject_coding_edit/'.$project_coding->project_id)}}"><button class="btn btn-black btn-stroke bold uppercase"> Edit</button></a>                      
                         
                    </td>
                </tr>
              @endforeach
           @endif    
        </tbody>
    </table>
</div>


 <!-- MODAL STICK UP  -->
<div class="modal fade modal-site stick-up" id="addNewAppModalWorkshop" tabindex="-1" role="dialog" aria-labelledby="addNewAppModalWorkshop" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header clearfix ">
        <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">&times;</span></button>
        <h4 class="title title-md">Workshop Login Form</h4>
        @if(Session::has('error_message'))
            <div class="alert alert-danger"><center>
             {{Session::get('error_message')}}</center>
             </div>
        @endif  
      </div>
      <form role="form" method="POST" id="createForm" class="ajax-form" action="{{url('/loginworkshop')}}">
         <input type="hidden" name="_token" value="{{csrf_token()}}">
       <div class="modal-body">               
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label>Username</label>
                <input type="text" name="email" class="form-control"  placeholder="E-mail" required>
                <span>{{ $errors->first('email') }}</span>
              </div>
            </div>
          </div> 
          <div class="row"> 
             <div class="col-sm-12">
              <div class="form-group">
                <label>Password</label>
                <input type="password" name="password"  class="form-control" placeholder="Username" required>
                <span>{{ $errors->first('password') }}</span>
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer" >
        <button type="submit" class="btn btn-success no-border btn-lg">Submit</button>
      </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- END MODAL STICK UP  -->