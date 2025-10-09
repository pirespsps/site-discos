@include('layouts.header', ['titulo' => $titulo])

@yield('body')
<div class="container w-100 h-100 d-flex">

    <div class="bg-dark w-25 p-4 vh-100 justify-content-start d-block mt-3 mb-3 border border-primary">
        <div class = "container h-10 w-10">
            <img src="{{ asset($cover) }}" class="w-100 h-100 justify-content-center bg">
        </div>
            <div class="text-default d-block p-3">
                <div>Gêneros: {{ implode(', ',$tags) }}</div>
                @if ($type != "banda")
                    <div>Duração: {{ $duracao }}</div>
                @endif
            </div>
            <div class = "container h-10 w-10">
                <div class = "row d-flex align-items-center justify-content-center">
                    <div class="text-default d-block text-center p-3">
                        <div class="stars d-flex"><!-- botar pra deixar as estrelas dinamicas depois, tratar para track -->
                            @for ($i = 1; $i <= 5; $i++)
                                <div class="h-50">
                                    <img class="w-75 h-25 img-fluid" src="{{ asset('images/whiteStarIcon.png') }}">
                                </div>
                            @endfor
                        </div>
                        <div class="stars">Sua Nota</div>
                    </div>
                </div>
            </div>
            <div class="text-default d-flex text-center mt-5 mb-5">

                @if($type != "banda")
                    <div>
                        <img class="w-75 h-50"
                            src="{{ asset('images/' . ($isListened ? 'primaryEarIcon' : 'whiteEarIcon') . '.png')}}">
                        <p>Escutado</p>
                    </div>
                @endif

                <div>
                    <img class="w-75 h-50"
                        src="{{ asset('images/' . ($isLiked ? 'primaryHeartIcon' : 'whiteHeartIcon') . '.png')}}">
                    <p>Favoritar</p>
                </div>

                @if (isset($hasCommentary))
                    <div>
                        <img class="w-75 h-50"
                            src="{{ asset('images/' . ($hasCommentary ? 'primaryCommentaryIcon' : 'whiteCommentaryIcon') . '.png')}}">
                        <p>Comentar</p>
                    </div>
                @endif

            </div>
    </div>

    <div class="d-block text-default w-100 h-100">

        <div>
            <div class="d-flex mt-3 mx-3">
                <h1>{{ $titulo }}</h1>
                <div class="mt-3 mx-2">
                    <p>{{ $ano }}</p>
                </div>
            </div>

            <div class="mx-4 mb-3">
                @if($type == 'track')
                    <p style="margin-bottom: 0">pertence a
                        <a href="{{ route('discos.show',['disco' =>  $disco_id ]) }}" class="text-white text-decoration-none">{{ $disco }}</a>
                    </p>
                @endif

                @if ($type != 'banda')
                    <p style="margin-bottom: 0">de
                        <a href="{{ route('bandas.show',['banda' => $banda_id]) }}" class="text-white text-decoration-none">{{ $banda }}</a>
                    </p>
                @endif
                <p style="margin-bottom: 0">cadastrado por
                    <a href="/usuarios/{{ $usuario_id }}" class="text-white text-decoration-none"> {{ $usuario }} </a>
                </p>
            </div>
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
                                <a href="/{{ $type == 'banda' ? "discos" : "tracks" }}/{{ $id }}"
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

        <div>
            @foreach ($comentarios as [$id,$usuario,$icon,$texto])
                <div class="bg-dark p-1 mx-4 mb-3 rounded">
                    <a class="text-decoration-none" href="#{{ $id }}">
                        <div class="w-25">
                            <img class="w-25" src="{{asset($icon)}}">
                            {{ $usuario }}
                        </div>
                    </a>
                    <p>{{ $texto }}</p>
                </div>
            @endforeach
        </div> <!--paginate-->

    </div>

</div>