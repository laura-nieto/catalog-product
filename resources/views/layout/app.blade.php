<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
    
    <header>
        <nav class="nav">
            <ul class="nav--ul">
                @guest
                    <div class='nav--logo'>
                        <li class="nav--ul__li"><a href="/">Logo</a></li>
                    </div>
                    <div class="nav--login">
                        <li class="nav--ul__li"><a href="/new/product">Anunciá con nosotros</a></li>
                    </div>
                    <div class="nav--login">
                        <li class="nav--ul__li"><a href="/login">Login</a></li>
                    </div>
                @else
                    <div class='nav--logo'>
                        <li class="nav--ul__li"><a href="/">Logo</a></li>
                    </div>
                    <div class="nav--login">
                        <li class="nav--ul__li"><a href="/new/product">Anunciá con nosotros</a></li>
                    </div>
                    <div class="nav--login">
                        <li class="nav--ul__li"><a href="/new/product">Trabajá con nosotros</a></li>
                    </div>
                    <div class="nav--login">
                        <li class="nav--ul__li"><a href="/logOut">Cerrar Sesión</a></li>
                    </div>
                @endguest
            </ul>
        </nav>
    </header>

    <main>
        @yield('main')
    </main>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>