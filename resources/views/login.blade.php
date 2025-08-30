@extends('layouts.principal-layout')

@section('content')

@if ($isLoginFailed)
<h1>Senha incorreta</h1>
@endif

<form action="{{ route('login-entrar') }}" method="POST">
    @csrf

    <input type="email" name="text-email" placeholder="E-mail...">
    <input type="password" name="text-password" placeholder="Senha...">

    <input type="submit">
</form>

@endsection