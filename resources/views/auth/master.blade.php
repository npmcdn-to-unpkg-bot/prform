<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
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
    <link href="plugins/pace/pace.css" rel="stylesheet">
    <link href="plugins/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
{{--     <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    [if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif] --}}
    <script src="plugins/pace/pace.min.js"></script>
</head>

<body class="page-login">
    <header class="header">
    </header>
    <section class="page-banner section">
        <div class="page-banner-inside text-center">
            <div class="container">
                <div class="page-banner-content">
                    <a href="" class="brand-logo">
                        <img src="images/logo.png" alt="Top3media">
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-4">

                    @yield('content')

                </div>
            </div>
        </div>
    </section>
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="copy-info text-center">
                        Copyright 2015 <strong>Top3 Media</strong>. All Rights Reserved.
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>
