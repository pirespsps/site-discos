@extends('layouts.principal-layout')

@section('content')

<form action="{{ route('cadastro-entrar') }}" method="POST">
    @csrf
    <input type="text" name="text-user" placeholder="Usuário...">
    <input type="email" name="text-email" placeholder="E-mail...">
    <input type="password" name="text-password" placeholder="Senha...">

    <input type="submit">
</form>

@endsection