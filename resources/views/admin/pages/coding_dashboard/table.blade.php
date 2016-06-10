<div class="table-responsive mt-60">
    
    <table id="employee-grid" class="table table-dash">
        <thead>
            <tr>
                <th>Project Name</th>
                <th>Awarded To</th>
                <th>Invision Link</th>
                <th>Demo link</th> 
                <th>Live link</th>              
                <th style="width:190px">&nbsp;</th>
            </tr>
        </thead>
        <tbody class="table-data">
          @if($allcoding)
              @foreach($allcoding as $coding) 
                <tr>
                    <td>{{$coding->project_title}}</td>
                    <td>{{$coding->awarded_to}}</td>
                    <td>{{$coding->invision_lik}}</td>
                    <td>{{$coding->demo_link}}</td>
                    <td>{{$coding->live_lik}}</td>
                    <td>
                        <a class="btn btn-black btn-stroke bold uppercase" href="{{url('/edit_project_coding/'.$coding->id)}}">Edit</a>  <a class="btn btn-black btn-stroke bold uppercase" href="{{url('/porject_delete/'.$coding->id)}}"> Delete </a>                       
                    </td>
                </tr>
              @endforeach
           @endif    
        </tbody>
    </table>
</div>