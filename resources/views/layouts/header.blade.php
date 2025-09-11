<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/js/app.js','resources/scss/app.scss'])
    <link rel="stylesheet" href="style.css">
    <title>Site Disco</title>
</head>
<body>
<div class="container-fluid bg-dark h-40 full-width-container m-0 p-0 align-content-center">
    <div class="d-flex justify-content-between">
        <div class="mb-3 d-flex justify-content-start">
            <img src={{asset('images/logo.png')}} class="mt-2 mx-2" alt="Discoteca" width="60" height="60">
            <a class="text-light mt-3 h2 text-decoration-none" href = {{route('index') }}>Discoteca</a>
        </div>
        <div class="d-flex justify-content-between align-content-center row-gap-4">
            <a class="text-light mt-4 mx-3 text-decoration-none" href = {{route('index') }}>Amigos</a>
            <a class="text-light mt-4 mx-3 text-decoration-none" href = {{route('index') }}>Noticias</a>
            <a class="text-light mt-4 mx-3 text-decoration-none" href = {{route('index') }}>Playlists</a>
            <a class="text-light mt-4 mx-3 text-decoration-none" href = {{route('index') }}>Discos</a>
             <div class="d-flex justify-content-between align-content-center">
                <input class="form-control bg-secondary text-info rounded-5 mt-3 mb-4 mx-3" type="text" name="pesquisa" placeholder="Pesquisar">
                <a href = {{route('index') }}><button class="btn btn-primary w-40 rounded-5 mt-3 mx-3" type="button">+</button></a>
                <img src={{asset('images/listras.png')}} class="mx-3"alt="Discoteca" width="70" height="84">

                @if ( Cookie::get('conta') )
                    <img class="mt-3 mx-4" src="{{asset('images/usuarioIcon.png')}}" width="40" height="40">
                @else
                    <a href = {{route('login') }}><button class="btn btn-primary w-40 rounded-5 mt-3 mx-3" type="button">Entrar</button></a>
                @endif

            </div>
        </div>
    </div>
</div>
</body>
</html>


