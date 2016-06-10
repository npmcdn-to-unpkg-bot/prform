@extends('admin.master')

@section('title', 'Project Pricing And Costing')

@section('content')

    <section class="main-content">
            <section class="section section-page-xicon">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="page-xicon">
                                <img src="{{ URL::asset('images/icon/4-lg.png') }}" alt="icon">
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            @if(Session::has('msg'))<h5 align="center" style="color:green">{{Session::get('msg')}}</h5> @endif

            <form class="form-horizontal" method="POST" action="{{ url( Request::path() ) }}">
            <input name="_token" type="hidden" value="{{ csrf_token() }}">

                <section class="section section-project">
                    <div class="container">

                        @include('admin.pages.porject_hosting.form_top')
                        @include('admin.pages.porject_hosting.form_middle')
                        @include('admin.pages.porject_hosting.form_bottom')

                        <div class="wagon mb-70 mt-50">
                            <div class="wagon-body">
                                <div class="other-note-holder @if($errors->has('other_notes')) has-error has-feedback @endif">
                                    <label>Other Notes:</label>
                                    <textarea required name="other_notes" class="form-control stk2" placeholder="Company Address">@if(Request::old('other_notes')){{Request::old('other_notes')}}@elseif ( isset($project_hosting) && !empty($project_hosting) ){{ $project_hosting->other_notes }}@endif</textarea>
                                   <span style="color: red;">{{ $errors->first('other_notes') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-red btn-afix text-uppercase bold btn-lg">Save &amp; Update</button>
                        </div>
                    </div>
                </section>

            </form>
        </section>
@endsection