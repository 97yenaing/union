<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="{{asset('js/jquery.min.js')}}"></script>
        <script src="{{asset('js/welcome.js')}}"></script>


        <script src="{{asset('js/slider.js')}}"></script>
        

        <title>Union-Welcome_Pages</title>
    </head>
    <body>

            <div class="content">
                <img  class="logo" src="img/union.png" alt="Union-LOGO">
                @if (Route::has('login'))
                            <div class="top-right links">
                                @auth
                                    <a href="{{ url('/home') }}">Home</a>
                                @else
                                    <a href="{{ route('login') }}">Login</a>
                                    
                                @endauth
                            </div>
                @endif    
                </div>
                
            </div>
    </body>
    
</html>
