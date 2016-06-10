<section class="section section-edit-project">
    <form class="form-horizontal" method="POST" action="{{ url( Request::path() ) }}">
        <input name="_token" type="hidden" value="{{ csrf_token() }}">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">

                    {{-- Errors Showing - Start --}}
                    @if($errors->has())
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li style="color:red;">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    {{-- Errors Showing - END --}}

                    <div class="panel-project-binfo">

                        @yield('edit_button')

                        @include('user.pages.add_new_project.form_project')

                    </div>
                </div>

                @include('user.pages.add_new_project.form_company')
                @include('user.pages.add_new_project.form_contact_person')

            </div>

            @include('user.pages.add_new_project.form_team')

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