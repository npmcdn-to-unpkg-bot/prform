<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="csrf_token" content="{{ csrf_token() }}"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>PR Form </title>

    <link href="{{ URL::asset('plugins/pace/pace.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('plugins/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    
    <link href="{{ URL::asset('plugins/icheck/skins/flat/flat.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('plugins/icheck/skins/flat/green.css') }}" rel="stylesheet">
   

    <link href="{{ URL::asset('css/animate.css') }}" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/custom.css') }}" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
    <script src="{{ URL::asset('plugins/pace/pace.min.js') }}"></script>

</head>
 

<body class="page-portfolio">
    <header class="header hide">
        <nav class="base-navbar">
            <div class="container">
                <ul class="base-nav">
                    <li><a href=""><i class="fa fa-caret-left"></i>&nbsp; Go Back</a></li>
                </ul>
            </div>
        </nav>
    </header>


    @include('admin.pages.portfolio.header_text')

	@yield('content')

    @include('admin.pages.portfolio.footer_text')


        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>

        <script src="{{ URL::asset('plugins/icheck/icheck.min.js') }}"></script>       
      
       
        <script src="{{ URL::asset('plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>

        <script src="{{ URL::asset('plugins/jmh/jquery.matchHeight.js') }}"></script>
    
        <script src="{{ URL::asset('plugins/browserclass.js') }}"></script>      


    <script src="https://npmcdn.com/imagesloaded@4.1/imagesloaded.pkgd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/2.2.2/isotope.pkgd.min.js"></script>



    <script>
        $(document).ready(function() {

            $(function() {
                $('.folio-eqlh').matchHeight();
            });

            $(function() {
                var $container = $('.folio-container');

                $container.imagesLoaded( function() {
                    $container.isotope({
                        filter: '*',
                        itemSelector: '.folio-item',
                        layoutMode: 'masonry',
                        animationOptions: {
                            duration: 750,
                            easing: 'linear',
                            queue: false
                        }
                    });
                });

                $('.folio-filter a').click(function(){
                    $('.folio-filter .active').removeClass('active');
                    $(this).addClass('active');
             
                    var selector = $(this).attr('data-filter');
                    $container.isotope({
                        filter: selector,
                        animationOptions: {
                            duration: 750,
                            easing: 'linear',
                            queue: false
                        }
                     });
                     return false;
                }); 
            });

            $(".btn-tr-add").click(function() {
                $("table.table-pdetail-box tbody tr:first").clone().appendTo("table");
            });
            $('.btn-minus').on('click', function () {
                $(this).parents('tr').fadeOut();
            });
        });
    </script>
    
    </body>
</html>
