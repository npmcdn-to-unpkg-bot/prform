@extends('admin.master')

@section('title', 'Project Opprtunity')

@section('header_styles')
    @parent
    <script src="{{ URL::asset('plugins/icheck/icheck.min.js') }}"></script>
    <link href="{{ URL::asset('plugins/icheck/skins/flat/flat.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('plugins/icheck/skins/flat/green.css') }}" rel="stylesheet">
@endsection

@section('footer_scripts')
    @parent
    <script src="{{ URL::asset('plugins/icheck/icheck.min.js') }}"></script>
@endsection

@section('content')

	<section class="main-content">
        <section class="section section-page-xicon">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="page-xicon">
                            <img src="{{ URL::asset('images/icon/1-lg.png') }}" alt="icon">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="container">
                <h2 class="page-heading lighter text-center text-uppercase">Project Requirements</h2>
				
				@if(Session::has('msg'))<h5 align="center" style="color:green">{{Session::get('msg')}}</h5> @endif

        {{-- Errors Showing - Start --}}
            @if($errors->has())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li style="color:red;">{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            {{-- Errors Showing - END --}}

      <form class="form-horizontal" method="POST" action="{{ url( Request::path() ) }}" enctype="multipart/form-data">{{-- POST to same URL --}}
       <input name="_token" type="hidden" value="{{ csrf_token() }}">       
                @include('admin.pages.project_opportunity.upload')
                @include('admin.pages.project_opportunity.form')

            <div class="text-center pt-60 pb-30">
               <button type="submit" class="btn btn-red btn-afix text-uppercase bold btn-lg">Save &amp; Update</button>
           </div>
      </form>

            </div>
        </section>

    </section>

@endsection