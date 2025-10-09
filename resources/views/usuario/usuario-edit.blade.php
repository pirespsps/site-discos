@extends('layouts.principal-layout')
@include('layouts.header', ['titulo' => $usuario->user])

@section('content')

    <div class="d-flex justify-content-center mx-auto align-items-center vh-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-sm-8">
                    <div class="card p-4 bg-dark center rounded-5">

                            <div class="d-flex justify-content-between">
                                <div class="mb-3 d-flex justify-content-start">
                                    <img src={{asset('images/favicon.png')}} alt="Discoteca" width="70" height="70">
                                    <h3 class="text-light mt-3">Discoteca</h3>
                                </div>
                                <div class="mt-2 form-group pull-right">
                                    <a href = {{route('index') }}><button class="btn btn-default btn-close btn-close-white" type="button"></button></a>
                                </div>
                            </div>

                            <div class="row justify-content-center align-items-center text-cente">
                                <div class="col-md-10 col-12 align-items-center">
                                    <form method="POST" action="{{ route('usuarios.update', ['usuario' => $usuario->id]) }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="d-block h-25 w-100 p-3 justify-content-center">
                                            <div class="mb-3 w-100 d-flex justify-content-center">
                                                @method('PATCH')

                                                <label class="text-light mt-3" for="input_user">Foto:</label>
                                                <input name='path_img' class="h-25 mt-3" type="file">
                                            </div>

                                            <div class="mb-3 w-100 d-flex justify-content-start">
                                                    <label class="text-light mt-3" for="input_user">Usuário:</label>
                                                    <input class="form-control bg-secondary text-info rounded-5" name="input-user" type="text" value={{ $usuario->user }}>
                                            </div>

                                            <div class="mb-3 w-100 d-flex justify-content-start">
                                                    <label class="text-light mt-3" for="input_email">Email:</label>
                                                    <input class="form-control bg-secondary text-info rounded-5" name="input-email" type="text" value={{ $usuario->email }}>
                                            </div>

                                            <div class="mb-3 w-100 d-flex justify-content-start">
                                                    <label class="text-light mt-3" for="input_password">Senha:</label>
                                                    <input class="form-control bg-secondary text-info rounded-5" name="input-passowrd" type="text">
                                            </div>

                                            <div class="mb-3 w-100 d-flex justify-content-start">
                                                    <label class="text-light mt-3" for="confirm_password">Digite aqui sua senha atual</label>
                                                    <input class="form-control bg-secondary text-info rounded-5" name="confirm_password" type="text">
                                            </div>

                                            <input type="hidden" name="id_criador" value="{{ $usuario->id }}">

                                            <div class="mb-3 w-100 d-flex justify-content-center">
                                                <input type="submit" class="btn btn-success w-40 rounded-5" value="Enviar">
                                            </div>
                                        </div>
                                    </form>


                                    <form method="post" action="{{ route("usuarios.destroy", ['usuario' => $usuario->id]) }}">
                                        @method("DELETE")
                                        @csrf

                                        <div class="mt-5 d-flex justify-content-center">
                                            <input type="submit" class="btn btn-danger w-40 rounded-5" value="Deletar">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection