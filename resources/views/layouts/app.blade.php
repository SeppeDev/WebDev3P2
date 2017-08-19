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
    <link href="/css/nouislider.min.css" rel="stylesheet">
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
        
        @yield('content')
        
    </div>

    <!-- Scripts -->
    <script src="/js/wNumb.js"></script>
    <script src="/js/nouislider.min.js"></script>
    <script src="/js/app.js"></script>
    <script src="/js/scripts.js"></script>
    <!-- <script src="/js/paginate.js"></script> -->
    <script src="//code.jquery.com/jquery-1.12.3.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/js/materialize.min.js"></script>
    <script src="https://use.fontawesome.com/bbc1396a75.js"></script>
</body>
</html>
