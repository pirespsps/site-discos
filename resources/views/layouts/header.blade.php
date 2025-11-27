<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/js/app.js','resources/scss/app.scss'])
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" type="image/x-icon">
    @if (isset($titulo))
        <title>{{ $titulo }}</title>
    @else
        <title>Discoteca</title>
    @endif
</head>
<body>
<div class="container-fluid bg-dark h-40 full-width-container m-0 p-0 align-content-center">
    <div class="d-flex justify-content-between">
        <div class="mb-3 d-flex justify-content-start">
            <img src={{asset('images/favicon.png')}} class="mt-2 mx-2" alt="Discoteca" width="60" height="60">
            <a class="text-light mt-3 h2 text-decoration-none fw-bold" href = {{route('index') }}>Discoteca</a>
        </div>
        <div class="d-flex justify-content-between align-content-center row-gap-4">
            <a class="text-light mt-4 mx-3 text-decoration-none" href = {{route('bandas.index') }}>Bandas</a>
            <a class="text-light mt-4 mx-3 text-decoration-none" href = {{route('discos.index') }}>Discos</a>
             <div class="d-flex justify-content-between align-content-center">
                
                <div>
                    <input class="form-control bg-secondary text-info rounded-5 mb-1 mt-3 mx-3" type="text" name="pesquisar" id="pesquisar" placeholder="Pesquisar">
                    <ul class="bg-primary justify-content-start rounded-2 mx-4" id="dropdown-pesquisar" hidden>
                        <li data-value="usuarios" class="text-light text-center mx-auto justify-content-between mb-1 pesquisa-item">Pesquisar em usuários</li>
                        <li data-value="bandas" class="text-light text-center mx-auto justify-content-between mb-1 pesquisa-item">Pesquisar em bandas</li>
                        <li data-value="discos" class="text-light text-center mx-auto justify-content-between mb-1 pesquisa-item">Pesquisar em discos</li>
                    </ul>
                </div>

                <div id= "dropdown-header-parent">
                    <button class="btn btn-primary text-light fw-bold w-40 rounded-5 mt-4 mx-5" type="button">+</button>
                        <ul class= "bg-primary justify-content-start rounded-2" id="dropdown-header">
                            <li class="text-light text-center mx-2 justify-content-between mt-1 mb-1"><a class="text-light mt-4 mx-3 text-decoration-none" href = {{route('bandas.create') }}>Banda</a></li>
                            <li class="text-light text-center mx-2 justify-content-between mt-1 mb-1"><a class="text-light mt-4 mx-3 text-decoration-none" href = {{route('discos.create') }}>Disco</a></li>
                        </ul>
                </div>
                <img src={{asset('images/listras.png')}} class="mx-2"alt="Discoteca" width="70" height="84">

                @if ( session()->get('user','notLogged') != 'notLogged' )
                    <div id= "dropdown-header-parent">
                        <img class="mt-4 mx-5" src="{{asset('images/usuarioIcon.png')}}" width="40" height="40">
                            <ul class= "bg-primary justify-content-start rounded-2" id="dropdown-header">
                                <li class="text-light text-center mx-2 justify-content-between mt-1 mb-1"><a class="text-light mt-4 mx-3 text-decoration-none" href = {{route('usuarios.show',['usuario' => session()->get('user.id')]) }}>Perfil</a></li>
                                <li class="text-light text-center mx-2 justify-content-between mt-1 mb-1"><a class="text-light mt-4 mx-3 text-decoration-none" href = {{route('index') }}>Amigos</a></li>
                                <li class="text-light text-center mx-2 justify-content-between mt-1 mb-1"><a class="text-light mt-4 mx-3 text-decoration-none" href = {{route('logout') }}>Sair</a></li>
                            </ul>
                    </div>
                    @else
                    <a href = {{route('login') }}><button class="btn btn-primary w-40 rounded-5 mt-4 mx-3" type="button">Entrar</button></a>
                @endif

            </div>
        </div>
    </div>
<script type="module" src="{{ asset('js/header.js') }}"></script>
</div>
</body>
</html>
