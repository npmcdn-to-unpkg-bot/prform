<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="csrf_token" content="{{ csrf_token() }}"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <link rel="apple-touch-icon" sizes="57x57" href="ico/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="ico/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="ico/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="ico/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="ico/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="ico/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="ico/apple-touch-icon-144x144.png">
    <link rel="icon" type="image/png" href="ico/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="ico/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="ico/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="ico/manifest.json">
    <link rel="mask-icon" href="ico/safari-pinned-tab.svg" color="#2991d7">
    <meta name="msapplication-TileColor" content="#2991d7">
    <meta name="msapplication-TileImage" content="ico/mstile-144x144.png">
    <meta name="theme-color" content="#ffffff"> --}}
    <title>PR Form - @yield('title')</title>
@section('header_styles')

    <link href="{{ URL::asset('plugins/pace/pace.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('plugins/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/animate.css') }}" rel="stylesheet">

    <link href="{{ URL::asset('plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/custom.css') }}" rel="stylesheet">

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <script src="{{ URL::asset('plugins/icheck/icheck.min.js') }}"></script>
     <!--edit_form page -->
      <script src="{{ URL::asset('js/jquery.are-you-sure.js') }}"></script>
      <script src="{{ URL::asset('js/ays-beforeunload-shim.js') }}"></script>
    
    
    <script src="{{ URL::asset('plugins/pace/pace.min.js') }}"></script>
@show
</head>

<body @section('body_class') @show>
@section('header_nav')
    <header class="header">
        <nav class="base-navbar">
          <div class="container">
            <ul class="base-nav">             
                   <li><a href="{{ URL::to('/coding_dashboard')}}"><i class="fa fa-caret-left"></i>&nbsp; Go Back</a></li>                  
                </ul>
            </div>
        </nav>
    </header>
@show

@section('header_banner')
    <section class="page-banner section relative dark" style="background-image: url('{{ URL::asset('images/banner/1.jpg') }}');">
        <div class="page-banner-inside relative text-center">
            <div class="container">
                <div class="page-banner-content">
                    <h1 class="heading text-uppercase"> 
                     @if(isset($selected_projects))
                       PROJECT NAME - {{$selected_projects->project_title}}
                      @else
                        PROJECT NAME GOES HERE
                      @endif  
                    </h1>
                    <h3 class="sub-heading">                                   

                     @if(isset($selected_projects))                    
                        Share This : {{$selected_projects->invision_lik}}                      
                      @else
                        Corporate Website / PR#TOP123-356
                      @endif 
                     
                    </h3>
                    <div class="update-by">
                       
                    </div>
                </div>
            </div>
        </div>
    </section>
@show