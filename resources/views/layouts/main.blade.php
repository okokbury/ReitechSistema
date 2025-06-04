<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        {{-- Fonte --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Jost" rel="stylesheet">

        {{-- Scripts --}}
        <link rel="stylesheet" href="{{ asset('css/style_main.css') }}">

        {{-- Bootstrap --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">

    </head>
    <body>
        <header>
            <nav>
                <ul>
                    <li onclick=amostradinho()><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="26px" viewBox="0 -960 960 960" width="26px" fill="#000000"><path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg></a></li>
                </ul>
                <ul class="sanduixi">
                    <li onclick=desamostre()><a href='#'><svg xmlns="http://www.w3.org/2000/svg" height="26px" viewBox="0 -960 960 960" width="26px" fill="#000000"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg></a></li>
                    <li><a href="#">Login</a></li>
                    <li><a href="#">Produto</a></li>
                    <li><a href="#">Estoque</a></li>
                </ul>
                
            </nav>
        </header>

        

        @yield('content')
        <script>
            function amostradinho(){
                const sanduixi = document.querySelector('.sanduixi')
                sanduixi.style.display = 'flex'
            }
            function desamostre(){
                const sanduixi = document.querySelector('.sanduixi')
                sanduixi.style.display = 'none'
            }
        </script>
    </body>
</html>