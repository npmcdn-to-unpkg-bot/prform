<div class="table-responsive mt-60">
    <meta name="request_url" content="{{ url( Request::path() ) }}">
    <table id="employee-grid" cellspacing="0" width="40%" class="display table table-dash">     
        
            <tr><td>Project Name</td><td>{{$project_info->project_title}}</td></tr>           
            <tr><td>PROPOSAL NO.</td><td>{{$project_info->proposal_no}}</td></tr>
            <tr><td>Company Name</td><td>{{$project_info->company_name}}</td></tr>
            <tr><td>Address</td><td>{{$project_info->company_address}}</td></tr>
            <tr><td>Telephone</td><td>{{$project_info->company_telephone}}</td></tr>
            <tr><td>Created Date</td><td>{{$project_info->date}}</td></tr>
            <tr><td>Contact Name</td><td>{{$project_info->contact_first_name}} &nbsp;{{$project_info->contact_last_name}}</td></tr>           
           
            <tr><td>Fax</td><td>{{$project_info->company_fax}}</td></tr>           
            <tr><td>Mobile</td><td>{{$project_info->contact_mobile}}</td></tr>           
            <tr><td>E-mail</td><td>{{$project_info->contact_email}}</td></tr>            
    </table>
</div>