@extends('layouts.principal-layout')
@include('layouts.header', ['titulo' => $usuario->user])

@section('content')

    <div class="d-flex h-100 w-100">
        <div class="d-flex justify-content-center mx-auto align-items-center vh-100">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-sm-8">
                        <div class="card p-4 bg-dark center rounded-5">

                                <form method="POST" action="{{ route('usuarios.update', ['usuario' => $usuario->id]) }}" enctype="multipart/form-data">
                                @csrf
                                <div class="d-block h-25 w-100 p-3 justify-content-center text-center">
                                    <div class="mb-3 d-flex justify-content-start">
                                        @method('PATCH')

                                        <label class="text-light mt-3" for="input_user">Foto:</label>
                                        <input name='path_img' class="h-25" type="file">
                                        
                                        <div>
                                            <label class="text-light mt-3" for="input_user">Usuário:</label>
                                            <input name="input-user" type="text" value={{ $usuario->user }}>
                                        </div>
                                    </div>
                                    <div>
                                        <label for="input_email">Email:</label>
                                        <input name="input-email" type="text" value={{ $usuario->email }}>
                                    </div>

                                    <div>
                                        <label for="input_password">Senha:</label>
                                        <input name="input-passowrd" type="text">
                                    </div>

                                    <div class="d-block">
                                        <label for="confirm_password">Digite aqui sua senha atual</label>
                                        <input name="confirm_password" type="text">
                                    </div>

                                    <input type="hidden" name="id_criador" value="{{ $usuario->id }}">

                                    <input type="submit" class="button button-primary" value="Enviar">
                                
                                </div>
                            </form>

                            <form method="post" action="{{ route("usuarios.destroy", ['usuario' => $usuario->id]) }}">
                                @method("DELETE")
                                @csrf

                                <input type="submit" value="Deletar">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection