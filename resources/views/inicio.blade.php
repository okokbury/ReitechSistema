<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Reitech</title>

        {{-- Fonte --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Jost" rel="stylesheet">

        <link rel="stylesheet" href="css/firstpage.css">

        {{-- Bootstrap --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">

    </head>
    <body class="corpo">

        <main>
            <div class="container-homepage">
            <img src="img\logo.png" class="logo">
            <p class="desc-img">Manutencao em equipamentos odontologicos</p>
                <div class="container-botoes">
                    <button class="botao-login">
                        <a href="/" class="nav-link">Login</a>
                    </button>
                    <button class="botao-login">
                        <a href="/homepage" class="nav-link">HMPG</a>
                    </button>
                </div>
            </div>
        </main>

    </body>
</html>
