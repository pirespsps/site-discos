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
                    </div>
                </div>
            </div>
            <div class="text-default d-flex text-center mt-5 mb-5">
            </div>
    </div>

    <div class="d-block text-default w-100 h-100">

        <div>
            <div class="d-flex mt-3 mx-3">
                <input name="titulo" type="text" id="tituloI" value={{ $titulo }} class="form-data"></input>
                <div class="mt-3 mx-2">
                    <input name="ano" value={{ $ano }} id="anoI" class="form-data"></input>
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
                        <select name="banda" id="bandaI">
                            @foreach ($bandas as $b)
                                @if ($b->id == $banda_id)
                                    <option value={{ $b->id }} selected>{{ $b->nome }}</option>
                                @else
                                    <option value={{ $b->id }}>{{ $b->nome }}</option>
                                @endif
                            @endforeach
                        </select>
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

                <table id="tabela" class="table table-dark table-striped table-hover">

                    <thead>
                        <th>Título</th>
                        @if($type != 'banda')
                            <th>Duração</th>
                        @else
                            <th>Ano</th>
                        @endif
                        <th>Remover</th>
                    </thead>

                    @foreach ($multipleData as [$tituloT, $valor, $idT]) <!--tabela com input e remove-->
                        <tr name="row{{ $idT }}" class="rowI">
                            <td><input name="mTitulo{{ $idT }}" type="text" value="{{$tituloT}}"></td>
                            <td><input name="mValue{{ $idT }}" type="text" value="{{$valor}}"></td>
                            <td class="ml-4"><button name="remove{{ $idT }}" class="btn btn-danger removeBT">X</button></td>
                        </tr>
                    @endforeach

                </table>

            </div>
        @endif

    </div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script type="module" src="{{ asset('js/editLayout.js') }}"></script>

</div>

<div class="d-flex text-center justify-content-center mb-3">
        <button class="btn btn-secondary mx-5">
            <a class="text-white text-decoration-none" href="{{ "/{$type}s/{$id}" }}">
                Cancelar
            </a>
        </button>
        <button id="confirmarBT" class="btn btn-success mx-5">Confirmar edição</button>
</div>
