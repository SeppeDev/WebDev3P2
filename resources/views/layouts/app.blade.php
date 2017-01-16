<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Kowloon</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">
    <link href="/css/styles.css" rel="stylesheet">
    <!-- BOOTSTRAP <link href="/css/app.css" rel="stylesheet"> -->

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
    
      ga('create', 'UA-90333790-1', 'auto');
      ga('send', 'pageview');
    
    </script>
</head>
<body>
    <div id="app">
        @include('cookieConsent::index')
        <div class="side-nav-bar">
            <!-- Material sidebar -->
            <div id="sidebar" class="sidebar sidebar-default open" role="navigation">
                <!-- Sidebar navigation -->
                <ul class="nav sidebar-nav">
                    
                    <li id="menu">
                        <a href="{{ url( App::getLocale() )}}">
                            <i class="fa fa-bars center-align" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li class="menu">
                        <a href="{{ url( App::getLocale() . '/search' )}}">
                            <i class="fa fa-search center-align" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li class="menu">
                        <a href="{{ url( App::getLocale() . '/faq' )}}">
                            <i class="fa fa-question center-align" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li class="menu">
                        <a href="{{ url( App::getLocale() . '/about' )}}">
                            <i class="fa fa-envelope-o center-align" aria-hidden="true"></i>
                        </a>
                    </li>
                    
                    <li class="divider"></li>
                    
                    <li class="category white-animals">
                        <a href="{{ url( App::getLocale() . '/category/1' )}}">
                            <img class="dogs" src="{{ url('img/transparent.png') }}" alt="Dogs">
                        </a>
                    </li>
                    <li class="category white-animals">
                        <a href="{{ url( App::getLocale() . '/category/2' )}}">
                            <img class="cats" src="{{ url('img/transparent.png') }}" alt="Cats">
                        </a>
                    </li>
                    <li class="category white-animals">
                        <a href="{{ url( App::getLocale() . '/category/3' )}}">
                            <img class="fish" src="{{ url('img/transparent.png') }}" alt="Fish">
                        </a>
                    </li>
                    <li class="category white-animals">
                        <a href="{{ url( App::getLocale() . '/category/4' )}}">
                            <img class="birds" src="{{ url('img/transparent.png') }}" alt="Birds">
                        </a>
                    </li>
                    <li class="category white-animals">
                        <a href="{{ url( App::getLocale() . '/category/5' )}}">
                            <img class="small-animals" src="{{ url('img/transparent.png') }}" alt="Small animals">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row content">
            @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <script src="/js/scripts.js"></script>
    <!-- <script src="/js/paginate.js"></script> -->
    <script src="//code.jquery.com/jquery-1.12.3.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
    <script src="https://use.fontawesome.com/bbc1396a75.js"></script>
</body>
</html>
