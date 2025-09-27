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
        <button class="tab-item text-default btn link-primary " onclick="openTab(event, 'Tudo')" id="defaultOpen">Tudo</button>
        <button class="tab-item text-default btn " onclick="openTab(event, 'Bandas')">Bandas</button>
        <button class="tab-item text-default btn " onclick="openTab(event, 'Discos')">Discos</button>
        <button class="tab-item text-default btn " onclick="openTab(event, 'Logs')">Logs</button>
        <button class="tab-item text-default btn " onclick="openTab(event, 'Comentarios')">Comentários</button>
    </div>
</div>

<!-- Tabs -->

<div id="Tudo" class="tab-content">
    <h1>Olha lá</h1>
</div>

<div id="Bandas" class="tab-content">
    <h1>Bandas</h1>
</div>

<div id="Discos" class="tab-content">
    <h1>Discos</h1>
</div>

<div id="Logs" class="tab-content">
    <h1>Logs</h1>
</div>

<div id="Comentarios" class="tab-content">
    <h1>Comentários</h1>
</div>

<script src="{{ asset('js/usuario.js') }}"></script>
