@extends('layouts.principal-layout')


@section('content')

<style>
    body {
        background-image: url('images/fundo_cadastros.png');
    }
</style>

<div class="d-flex justify-content-center mx-auto align-items-center vh-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-sm-8">
                <div class="card p-4 bg-dark center rounded-5">
                    
                    <div class="d-flex justify-content-between">
                        <div class="mb-3 d-flex justify-content-start">
                            <img src={{asset('images/logo.png')}} alt="Discoteca" width="70" height="70">
                            <h3 class="text-light mt-3">Discoteca</h3>
                        </div>
                        <div class="mt-2 form-group pull-right">
                            <a href = {{route('index') }}><button class="btn btn-default btn-close btn-close-white" type="button"></button></a>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-md-10 col-12">
                            <form action="{{ route('login-entrar') }}" method="POST" novalidate>
                            @csrf  
                            <div class="mb-5">
                                <label class=" h3 text-light" for="text_email" class="form-label">Email</label>
                                <input class="form-control bg-secondary text-info rounded-5" type="text" name="text_email" value="{{ old('text_email') }}">
                                @error('text_email')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-5">
                                <label class="h3 text-light" for="text_username" class="form-label">Usuário</label>
                                <input class="form-control bg-secondary text-info rounded-5" type="text" name="text_username" value="{{ old('text_username') }}">
                                @error('text_username')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-5">
                                <label class=" h3 text-light" for="text_password" class="form-label">Senha</label>
                                <input class="form-control bg-secondary text-info rounded-5" type="password" name="text_password">
                                @error('text_password')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-5">
                                <label class=" h3 text-light" for="text_confirmpassword" class="form-label">Confirme sua senha</label>
                                <input class="form-control bg-secondary text-info rounded-5" type="password" name="text_confirmpassword">
                                @error('text_confirmpassword')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-3 d-flex justify-content-between">
                                <a href = {{route('login') }}><button class="btn btn-secondary w-40 rounded-5" type="button">Já tenho uma conta (Entrar)</button></a>
                                <button class="btn btn-success w-40 rounded-5" type="submit">Criar</button>
                            </div>
                            </form>
                        </div>
                    </div>


                    <div class="text-center text-secondary">
                        <small>&copy; <?= date('Y') ?> Discoteca</small>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>

@endsection