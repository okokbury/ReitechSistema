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
        <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        {{-- Bootstrap --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">

    </head>
    <body>
        <div class="fundo-tela"></div>
        <header>
            <nav>
                <ul>
                    @auth
                    <li onclick=amostradinho()><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="26px" viewBox="0 -960 960 960" width="26px" fill="#000000"><path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg></a></li>
                    @endauth
                    @guest
                    <li><a href="/login">Login</a></li>
                    @endguest
                    @auth
                    <li class="dropdown">
                        <a class="dropdown-toggle" href="#" data-bs-toggle="dropdown" >Foto user</a>
                        <ul class="dropdown-menu">
                            <li><form class="dropdown-item" action="/logout" method="POST">@csrf 
                                <a href="/logout" 
                                class="nav-link" 
                                onclick="event.preventDefault();
                                this.closest('form').submit();">
                                Sair</a>
                            </form>
                            </li>
                        </ul>
                    </li>
                    @endauth
                </ul>
                @auth
                <ul class="sanduixi">
                    <li onclick=desamostre()><a href='#'><svg xmlns="http://www.w3.org/2000/svg" height="26px" viewBox="0 -960 960 960" width="26px" fill="#000000"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg></a></li>
                    <li><a href="/">Inicio</a></li>
                    
                    <li class="dropdown">
                        <a class="dropdown-toggle" href="#" data-bs-toggle="dropdown" >Produto</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/produtos">Estoque</a></li>
                            <li><a class="dropdown-item" href="/produtos/criar">Criar Produto</a></li>
                            <li><a class="dropdown-item" href="/categorias">Categorias de Produto</a></li>
                        </ul>
                    </li>
                    <li><a href="/ordemservico">Ordem de Serviço</a></li>
                    
                </ul>
                @endauth
            </nav>
        </header>
        @auth
        
        <main>
            <div class="container-fluid">
                <div class="row">
                @if(session('msg'))
                    <div class="flash-message" id="flash-message">
                        <span>{{ session('msg') }}</span>
                        <button type="button" class="flash-close-btn" onclick="this.parentElement.style.display='none';">&times;</button>
                    </div>
                @endif
                </div>
            </div>
            @yield('content')
        </main>

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
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
    @endauth
    </body>
</html>