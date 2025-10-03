@include('layouts.header', ['titulo' => $usuario->user])

<div class="w-100 h-100">
    <div class="d-flex h-25 w-100 p-3">
        <img class="h-25 rounded-circle border border-primary" src="{{ asset($usuario->path_img) }}">
        <h1 class="text-default">{{$usuario->user  }}</h1>
        @if($usuario->id == session()->get('user.id'))
            <button class="btn btn-primary h-25 mt-2 mx-3">Editar Perfil</button>
        @endif

    </div>

    <div class="w-50 mx-3">
        <button class="tab-item text-default btn link-primary " onclick="openTab(event, 'Tudo')"
            id="defaultOpen">Tudo</button>
        <button class="tab-item text-default btn " onclick="openTab(event, 'Bandas')">Bandas</button>
        <button class="tab-item text-default btn " onclick="openTab(event, 'Discos')">Discos</button>
        <button class="tab-item text-default btn " onclick="openTab(event, 'Logs')">Logs</button>
        <button class="tab-item text-default btn " onclick="openTab(event, 'Comentarios')">Comentários</button>
    </div>
</div>

<!-- Tabs -->

<div id="Tudo" class="tab-content">
    @foreach ($cards as $card)
        <div class="bg-dark w-75 rounded m-2 d-flex border border-primary">
            <div class="w-100 h-100 d-block">
                <a class="text-default text-decoration-none"
                    href="{{ route('bandas.show', ['banda' => $card['banda_id']]) }}">
                    <h2 class="mx-5">{{ $card['banda'] }}</h2>
                    <img class="w-50 mx-3 rounded p-2" src="{{ asset($card['banda_img']) }}">
                </a>
            </div>

            <div class="d-flex mt-5">
                @foreach ($card['discos'] as [$titulo, $image, $id])
                    <div class="h-50 w-50 d-block mx-3">
                        <a class="text-default text-decoration-none" href="{{ route('discos.show', ['disco' => $id]) }}">
                            <img class="w-25 rounded" src="{{ asset($image) }}">
                            <p class="">{{ $titulo }}</p>
                        </a>
                    </div>
                @endforeach
            </div>

        </div>
    @endforeach
</div>

<div id="Bandas" class="tab-content">
    <div class="d-flex w-100 h-100">

        @foreach ($bandas as [$titulo, $image, $id])

            <div class="h-50 w-50 text-default">
                <a class="text-default text-decoration-none" href="{{ route('bandas.show', ['banda' => $id]) }}">
                    <img class="h-75 w-75" src="{{ asset($image) }}">
                    <p>{{ $titulo }}</p>
                </a>
            </div>

        @endforeach
    </div>
</div>

<div id="Discos" class="tab-content">

    <div class="d-flex w-100 h-100">

        @foreach ($discos as [$titulo, $img, $id])

            <div class="h-50 w-50 text-default">
                <a class="text-default text-decoration-none" href="{{ route('discos.show', ['disco' => $id]) }}">
                    <img class="h-75 w-75" src="{{ asset($img) }}">
                    <p>{{ $titulo }}</p>
                </a>
            </div>

        @endforeach
    </div>
</div>

<div id="Logs" class="tab-content">
    @foreach ($logs as $log)
        <div class="h-25 w-50 bg-dark d-flex rounded mt-3 {{ $log['isLiked'] ? 'border border-primary' : '' }}">
            <div class="d-block h-50 w-25">
                <a class="text-default text-decoration-none" href="{{ route('discos.show', ['disco' => $log['id']])}}">
                    <h3 class="w-100 mx-2">{{ $log['disco'] }}</h3>
                    <img class="h-50 w-50 p-2" src="{{ asset($log['img']) }}">
                </a>
            </div>
            <div class="h-25 w-100 d-flex mx-3">
                @for ($i = 0; $i < $log['nota']; $i++)
                    <div class="w-25 h-25">
                        <img class="h-25 w-25" src="{{ asset('images/primaryStarIcon.png') }}">
                    </div>
                @endfor
            </div>
            @if ($log['isLiked'])
                <div class="w-25 h-25">
                    <img class="h-25 w-25 mx-5 mt-2" src="{{ asset('images/primaryHeartIcon.png') }}">
                </div>
            @endif
        </div>
    @endforeach
</div>

<div id="Comentarios" class="tab-content">
    <div class="h-100 w-100">

        <button class="sub-tab-item text-default btn " id="defaultSubOpen"
            onclick="openSubTab(event, 'Sub-Discos')">Discos</button>
        <button class="sub-tab-item text-default btn " onclick="openSubTab(event, 'Sub-Bandas')">Bandas</button>
        <button class="sub-tab-item text-default btn " onclick="openSubTab(event, 'Sub-Tracks')">Tracks</button>

    </div>
</div>

<!-- Tabs de comentários -->

<div id="Sub-Discos" class="sub-tab-content">
    <div class="h-100 w-100">
        @foreach ($comentarios_disco as $comentario)
            <div class="w-50 h-25 border rounded p-2 m-3">
                <div class="w-25 h-25 d-flex">
                    <img class="w-25 h-25" src="{{ asset($comentario->disco[0]->path_img) }}">
                    <a class="text-decoration-none text-default"
                        href="{{ route('discos.show', ['disco' => $comentario->disco[0]->id]) }}">
                        <h3 class="mx-3">{{ $comentario->disco[0]->titulo }}</h3>
                    </a>
                </div>
                <p class="p-2">{{ $comentario->texto }}</p>
            </div>
        @endforeach
    </div>

</div>

<div id="Sub-Bandas" class="sub-tab-content">
    <div class="h-100 w-100">
        @foreach ($comentarios_banda as $comentario)
            <div class="w-50 h-25 border rounded p-2 m-3">
                <div class="w-25 h-25 d-flex">
                    <img class="w-25 h-25" src="{{ asset($comentario->banda[0]->path_img) }}">
                    <a class="text-decoration-none text-default"
                        href="{{ route('bandas.show', ['banda' => $comentario->banda[0]->id]) }}">
                        <h3 class="mx-3">{{ $comentario->banda[0]->nome }}</h3>
                    </a>
                </div>
                <p class="p-2">{{ $comentario->texto }}</p>
            </div>
        @endforeach
    </div>

</div>

<div id="Sub-Tracks" class="sub-tab-content">
    <div class="h-100 w-100">
        @foreach ($comentarios_track as $comentario)
            <div class="w-50 h-25 border rounded p-2 m-3">
                <div class="w-25 h-25 d-flex">
                    <img class="w-25 h-25" src="{{ asset($comentario->track[0]->banda->path_img) }}">
                    <a class="text-decoration-none text-default"
                        href="{{ route('tracks.show', ['track' => $comentario->track[0]->id]) }}">
                        <h3 class="mx-3">{{ $comentario->track[0]->titulo }}</h3>
                    </a>
                </div>
                <p class="p-2">{{ $comentario->texto }}</p>
            </div>
        @endforeach
    </div>

</div>


<script src="{{ asset('js/usuario.js') }}"></script>