<section class="section section-edit-project">
    <form class="form-horizontal" id="example-1-form" method="POST"  action="{{ url( Request::path() ) }}">
        <input name="_token" type="hidden" value="{{ csrf_token() }}">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    {{-- Errors Showing - Start --}}
                    
                    {{-- Errors Showing - END --}}

                    <div class="panel-project-binfo">

                        @yield('edit_button')

                        @if($errors->has())
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li style="color:red;">{{ $error }}</li>
                            @endforeach
                        </ul>
                       @endif

                        @include('admin.pages.add_new_project.form_project')

                    </div>
                </div>

                @include('admin.pages.add_new_project.form_company')
                @include('admin.pages.add_new_project.form_contact_person')

            </div>

            @include('admin.pages.add_new_project.form_team')

        @section('save_button')
            <div class="row">
                <div class="col-sm-12 text-right">
                    <button  type="submit" class="btn btn-primary text-uppercase bold btn-afix mt-15">Save</button>
                </div>
            </div>
        @show
        </div>
    </form>
</section>    

<script type="text/javascript">  
   $(document).ready(function(){    
     $(document).on('click', '#ready_for_update_btn', function() {
      $('.stk2').removeAttr('disabled');

       $('.add_update_btn').empty();
      $('.add_update_btn').append('<button type="submit" class="btn btn-default bold uppercase btn-stroke btn-edit-pro">Save</button>');
    }); 
  });
</script>