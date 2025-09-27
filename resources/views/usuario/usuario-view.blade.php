@include('layouts.header',['titulo' => $usuario->user])

<div class="d-flex h-50 w-100">
    <img class="h-25 rounded-circle border border-primary" src="{{ asset($usuario->path_img) }}">
    <h1>{{$usuario->user  }}</h1>
    @if($usuario->id == session()->get('user.id')) 
        <button class="btn btn-primary h-25 mt-2 mx-3">Editar Perfil</button>
    @endif
</div>

