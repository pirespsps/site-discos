@include('layouts.header', ['titulo' => $titulo])

@yield('body')
<div class="container w-100 h-100 d-flex">
    <input type="hidden" name="_token" id="_token" value={{ csrf_token() }}>
    <input type="hidden" name="type" id="type" value={{ $type . 's' }}>
    <input type="hidden" name="id" id="id" value={{ $id }}>

    <div class="bg-dark w-25 p-4 vh-100 justify-content-start d-block mt-3 mb-3 border border-primary">
        <div class = "container h-10 w-10">
            <img src="{{ asset('storage/' . $cover) }}" class="w-100 h-100 justify-content-center bg">
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
                                <div class="h-75">
                                    @if ( isset($nota) && $i <= $nota )
                                    <img id="star{{ $i }}" class="w-100 h-100 img-fluid starsIMG" src="{{ asset('images/primaryStarIcon.png') }}">    
                                    @else
                                    <img id="star{{ $i }}" class="w-100 h-100 img-fluid starsIMG" src="{{ asset('images/whiteStarIcon.png') }}">
                                    @endif
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
                        <img id="escutarIMG" class="w-75 h-50"
                            src="{{ asset('images/' . ($isListened ? 'primaryEarIcon' : 'whiteEarIcon') . '.png')}}">
                        <p>Escutado</p>
                    </div>
                @endif

                <div>
                    <img id="favoritarIMG" class="w-75 h-50"
                        src="{{ asset('images/' . ($isLiked ? 'primaryHeartIcon' : 'whiteHeartIcon') . '.png')}}">
                    <p>Favoritar</p>
                </div>

                @if (isset($hasCommentary))
                    <div>
                        <img id="comentarIMG" class="w-75 h-50"
                            src="{{ asset('images/' . ($hasCommentary ? 'primaryCommentaryIcon' : 'whiteCommentaryIcon') . '.png')}}">
                        <p>Comentar</p>
                    </div>
                @endif

            </div>
            @if ($usuario_id == session('user.id'))
                <div class="mx-auto text-center">
                    <button class="btn btn-primary"> 
                        <a href= {{"/{$type}s/{$id}/edit"}} class="text-white text-decoration-none">
                            Editar {{ $type }}
                        </a>
                    </button>
                </div>
            @endif
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

                    @foreach ($multipleData as [$tituloT, $valor, $id])
                        <tr>
                            <td>
                                <a href="/{{ $type == 'banda' ? "discos" : "tracks" }}/{{ $id }}"
                                    class="text-decoration-none text-default">
                                    {{$tituloT}}
                                </a>
                            </td>
                            <td>{{$valor}}</td>
                        </tr>
                    @endforeach

                </table>

            </div>
        @endif

        @if(!isset($comentarioUsuario))
        <div id="novoComentario" hidden>
            <div class="p-3 mx-4 mb-3 rounded bg-dark w-100">
                <h3>Enviar comentário</h3>
                <textarea id="comentarioTextArea" class="w-100"></textarea>
                <div class="justify-content-end d-flex">
                        <button id="cancelarComentario" class="btn btn-secondary mx-1 h-100 text-black">Cancelar</button>
                        <button id="enviarComentario"class="btn btn-primary mx-1 h-100 text-black">Enviar</button>
                </div>
            </div>
        </div>
        @else
        <div id="novoComentario">
            <div class="p-3 mx-4 mb-3 rounded bg-dark w-100">
                <h3>Editar comentário</h3>
                <input type="hidden" name="edit" id="edit" value="true">
                <textarea  id="comentarioTextArea" class="w-100">{{ $comentarioUsuario->texto }}</textarea>
                <div class="justify-content-end d-flex">
                        <button id="cancelarComentario" class="btn btn-secondary mx-1 h-100 text-black">Cancelar</button>
                        <button id="removerComentario" class="btn btn-danger mx-1 h-100 text-black">Remover</button>
                        <button id="enviarComentario"class="btn btn-primary mx-1 h-100 text-black">Salvar</button>
                </div>
            </div>
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

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script type="module" src="{{ asset('js/viewLayout.js') }}"></script>

</div>

<div hidden id="confirmDialog" 
style="
    top:0px;
    position: absolute;
    z-index: 100;
    overflow: hidden;
    background-color: rgba(000,000,000,0.3);">
    <div id="overlay" style="height: 150vh; width: 100vw; overflow: hidden;">
        <div class="bg-secondary w-50 p-3 text-center mx-auto col-md-6 rounded mt-5">
            <h5 class="text-white text-center">Você tem certeza que deseja remover seu comentário?</h5>
            <div class="d-flex text-center mt-5 pb-4 justify-content-center">
                <button id="cancelarRemover" class="btn btn-success mx-4">Cancelar</button>
                <button id="confirmarRemover" class="btn btn-danger mx-4">Confirmar</button>
            </div>
        </div>
    </div>
</div>
