@include('layouts.header', ['titulo' => $titulo])

@yield('body')
<div class="container w-100 h-100 d-flex">

    <div class="bg-dark w-25 p-4 vh-100 justify-content-start d-block mt-3 mb-3 border border-primary">
        <img src="{{ asset($cover) }}" class="p-3 w-100 h-50 justify-content-center bg">
        <div class="text-default d-block">
            <div>Gêneros: {{ implode(', ',$tags) }}</div>
            @if ($type != "banda")
                <div>Duração: {{ $duracao }}</div>
            @endif
        </div>
        <div class="text-default d-block text-center">
            <div class="stars"><!-- botar pra deixar as estrelas dinamicas depois -->
                @for ($i = 1; $i <= 5; $i++)
                    <img class="w-25 h-25" src="{{ asset('images/whiteStarIcon.png') }}">
                @endfor
            </div>
            <div class="stars">Sua Nota</div>
        </div>

        <div class="text-default d-flex text-center mt-5 mb-5">

            @if($type != "banda")
                <div>
                    <img class="w-75 h-50"
                        src="{{ asset('images/' . ($isListened ? 'primaryEarIcon' : 'whiteEarIcon') . '.png')}}">
                    <p>Ouvir Depois</p>
                </div>
            @endif

            <div>
                <img class="w-75 h-50"
                    src="{{ asset('images/' . ($isLiked ? 'primaryHeartIcon' : 'whiteHeartIcon') . '.png')}}">
                <p>Favoritar</p>
            </div>

            <div>
                <img class="w-75 h-50"
                    src="{{ asset('images/' . ($hasCommentary ? 'primaryCommentaryIcon' : 'whiteCommentaryIcon') . '.png')}}">
                <p>Comentar</p>
            </div>

        </div>

    </div>

    <div class="d-block text-default w-100 h-100">

        <div>
            <div class="d-flex p-3 mx-3">
                <h1>{{ $titulo }}</h1>
                <p>{{ $ano }}</p>
            </div>
            @if ($type != 'banda')
                <p>de
                    <a href="/bandas/{{ $banda_id }}" class="text-white text-decoration-none">{{ $banda }}</a>
                </p>
            @endif
            <p>cadastrado por
                <a href="/usuarios/{{ $usuario_id }}" class="text-white text-decoration-none"> {{ $usuario }} </a>
            </p>

        </div>

        @if(isset($multipleData))

            <div class="bg-dark mx-4 w-100 rounded">
                @if($type == "disco")
                    <h1 class="p-3">Músicas</h1>
                @else
                    <h1 class="p-3">Discos</h1>
                @endif

                <table class="table table-dark table-striped table-hover">

                    <thead>
                        <th>Título</th>
                        @if($type != 'banda')
                            <th>Duração</th>
                        @else
                            <th>Ano</th>
                        @endif
                    </thead>

                    @foreach ($multipleData as [$titulo, $valor, $id])
                        <tr>
                            <td>
                                <a href="/{{ $type == 'banda' ? "discos" : "musicas" }}/{{ $id }}"
                                    class="text-decoration-none text-default">
                                    {{$titulo}}
                                </a>
                            </td>
                            <td>{{$valor}}</td>
                        </tr>
                    @endforeach

                </table>

            </div>
        @endif

    </div>

</div>