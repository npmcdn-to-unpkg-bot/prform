@extends('admin.master')

@section('title', 'Look And Feel')

@section('header_styles')
    @parent
    <link href="{{ URL::asset('plugins/icheck/skins/flat/green.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('plugins/icheck/skins/flat/flat.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}" rel="stylesheet">
@endsection

@section('footer_scripts')
    @parent
    <script src="{{ URL::asset('plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ URL::asset('plugins/icheck/icheck.min.js') }}"></script>

@endsection

@section('content')

    <section class="main-content">
        <section class="section section-page-xicon">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="page-xicon">
                            <img src="{{ URL::asset('images/icon/3-lg.png') }}" alt="icon">
                        </div>
                    </div>
                </div>
            </div>
        </section>

          @if(Session::has('msg'))<h5 align="center" style="color:green">{{Session::get('msg')}}</h5> @endif 

     <?php 
        $look_and_fell = DB::table('look_feel_fields')->first(); 
     ?>    
       <form class="form-horizontal" method="post" id="example-1-form" action="{{url('/add_porject_visual/'.$proposal_no)}}">
            <input name="_token" type="hidden" value="{{ csrf_token() }}">
            
            <section class="section section-project">
                <div class="container">

                	@include('admin.pages.porject_visual.design')
                	@include('admin.pages.porject_visual.documents')
                	@include('admin.pages.porject_visual.notes')

                    <div class="text-center">
                        <button class="btn btn-red btn-afix text-uppercase bold btn-lg">Save &amp; Update</button>
                    </div>

                </div>
            </section>
        </form>


 <style type="text/css">
      .validator_output{color: red;}
 </style>

    </section>

@endsection