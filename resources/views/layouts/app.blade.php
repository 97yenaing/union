<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" media="print" rel="stylesheet">
    <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" media="screen" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/common.css') }}" rel="stylesheet">
    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @auth
                        
                            <ul class="nav nav-tabs  main-nav" id="main-title">
                                <li class="nav-item dropdown recption-dropdown">
                                @if (Auth::user()->name=="Admin")
                                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">Register</a>
                                @endif
                                @if (Auth::user()->name !=="Admin")
                                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">View User</a>
                                @endif
                                <ul class="dropdown-menu">
                                @if (Auth::user()->name=="Admin")
                                    <li><a class="dropdown-item" href="{{url('Admin/Register')}}">Register</a></li>
                                @endif
                                    <li><a class="dropdown-item" href="{{url('Admin/viewUser')}}">View User</a></li>
                                </ul>
                                </li>
                            </ul>
                            <ul class="nav nav-tabs  main-nav" id="main-title">
                                <li class="nav-item dropdown recption-dropdown">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">Patients</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{url('Patients/pt_process')}}">Patients process</a></li>

                                    <li><a class="dropdown-item" href="{{url('Patients/export')}}">Patients Export</a></li>
                                </ul>
                                </li>
                            </ul>
                        
                    @endauth

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}"style="display:none">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
<script type="text/javascript">
    
   var acc_name=$("#navbarDropdown").text()
   var cleanedValue = acc_name.replace(/\s+/g, '');
     let stateRegionData = {
        "Yangon": ["Insein", "HlaingTharYa(E)", "HlaingTharYa(W)"],
        "Mandaly": ["Aungmyaythazan", "Amarapura", "Chanayethazan"],
    };
    function region(){
        var state=$("#state").val();
        $('#township option:gt(0)').remove();
        console.log(stateRegionData);
        for(var i=0;i<stateRegionData[state].length;i++){
            var option=$("<option>").attr({value:stateRegionData[state][i]}).text(stateRegionData[state][i]);
            $("#township").append(option);
        }
    }
</script>
