<!DOCTYPE html>
<html class="csstransforms no-csstransforms3d csstransitions" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="{{asset('/resources/js/jquery.min.js')}}"></script>
    <script src="{{asset('/resources/js/bootstrap.js')}}"></script>

    <title>自助点餐后台管理系统</title>

    <!-- Fonts -->
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'> -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'> -->
    <link rel="stylesheet" href="{{asset('resources/css/bootstrap.css')}}">
    <!-- Styles -->
    <link href="{{asset('resources/css/bootstrap.css')}}" rel="stylesheet">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <link rel="stylesheet" type="text/css" href="{{asset('resources/css/metro-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('resources/css/font-awesome.min.css')}}">


    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }




  .grid .row {
    background-color: transparent;
    border: 0;
    height: 50px;
    padding-right: 0;
    
  }
  .grid .row .col-md-3
    {
        min-height: 150px;
    }
  .grid .row .col-md-6
    {
        min-height: 300px;
    }
    </style>

</head>
<!-- <body id="app-layout"> -->
<body>
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">

                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a class="navbar-brand" href="{{ url('/admin') }}">
                    自助点餐后台管理系统
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">

                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">登录</a></li>
                        <!-- <li><a href="{{ url('/register') }}">注册</a></li> -->
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>注销</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- JavaScripts -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script> -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->
    
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
     <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="scripts/vendor/bootstrap.min.js"></script>
    <script type="text/javascript" src="scripts/metro-docs.js"></script>
  <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36060270-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
  
  
  $('#collapse-sidebar').click(function()
  {
    
    $('.navbar-side').toggleClass('navbar-side-closed');
    $('#wrapper').toggleClass('wrapper-full');
    
    
  });

</body>
</html>
