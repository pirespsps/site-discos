@include('layouts.header', ['titulo' => $usuario->user])

<div class="w-100 h-100">

    <form method="POST" action="{{ route('usuarios.update', ['usuario' => $usuario->id]) }}">
    @csrf
    <div class="d-block h-25 w-100 p-3 justify-content-center text-center">
        @method('PATCH')

        <input class="h-25" type="file" value="{{ $usuario->path_img }}">
        
        <div>
            <label for="input_user">Usuário:</label>
            <input name="input-user" type="text" value={{ $usuario->user }}>
        </div>

        <div>
            <label for="input_email">Email:</label>
            <input name="input-user" type="text" value={{ $usuario->email }}>
        </div>

        <div>
            <label for="input_password">Senha:</label>
            <input name="input-user" type="text">
        </div>

        <div class="d-block">
            <label for="confirm_password">Digite aqui sua senha atual</label>
            <input name="input-user" type="text">
        </div>

        <input type="submit" class="button button-primary" value="Enviar">

    </div>
</form>

<form method="post" action="{{ route("usuarios.destroy", ['usuario' => $usuario->id]) }}">
    @method("DELETE")
    <input type="submit" value="Deletar">
</form>

</div>