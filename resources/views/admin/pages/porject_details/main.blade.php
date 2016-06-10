@extends('admin.master')

@section('title', 'Project Details')

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
                            <img src="{{ URL::asset('images/icon/2-lg.png') }}" alt="icon">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Errors Showing - Start --}}
        @if($errors->has())
            <ul>
                @foreach ($errors->all() as $error)
                    <li style="color:red;">{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        {{-- Errors Showing - END --}}
        <form class="form-horizontal" method="POST" action="{{ url( Request::path() ) }}">
            <input name="_token" type="hidden" value="{{ csrf_token() }}">

            @if(isset($project_features))
              @foreach($project_features as $fetures)
                <input type="hidden" name="feuture_auto_id[]"  value="{{$fetures->id}}">
              @endforeach  
            @endif    

            @include('admin.pages.porject_details.company_details')
            @include('admin.pages.porject_details.project_features')
            @include('admin.pages.porject_details.notes')

        </form>
    </section>
@endsection