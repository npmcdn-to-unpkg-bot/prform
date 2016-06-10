<div class="table-responsive mt-60">
    <meta name="request_url" content="{{ url( Request::path() ) }}">
    <table id="employee-grid" cellspacing="0" width="100%" class="display table table-dash">
        <thead>
            <tr>
                <th>Project Name</th>
                <th>PROPOSAL NO.</th>
                <th>SALESPERSON</th>
                <th>AccT manager</th>
                <th>Project Start</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody class="table-data">
          @if($allprojects)
              @foreach($allprojects as $projects) 
                <tr>
                    <td>{{$projects->project_title}}</td>
                    <td>{{$projects->proposal_no}}</td>
                    <td>{{$projects->sales_man}}</td>
                    <td>{{$projects->manager}}</td>
                    <td>{{$projects->date}}</td>
                    <td>
                        <a href="{{url('/porject_edit/'.$projects->proposal_no)}}"><button class="btn btn-black btn-stroke bold uppercase"> Edit</button></a>
                         @if(Auth::user()->user_name=='user1')<a href="{{url('/delete_porject/'.$projects->proposal_no)}}" onClick ="return confarmation();"><button class="btn btn-black btn-stroke bold uppercase">Delete</button></a> @endif 
                    </td>
                </tr>
              @endforeach
           @endif    
        </tbody>
    </table>
</div>