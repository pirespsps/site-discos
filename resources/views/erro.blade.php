@extends('layouts.principal-layout')
@extends('layouts.header',['titulo' => "Página não encontrada"])


@section('content')

<div class="alert bg-dark h-100 w-75 align-items-center text-center mx-auto mt-5">

    <h1 class="text-white">
        @if ($erro != null)
        {{ $erro }}
        @else
        Página não encontrada
        @endif
    </h1>
    @if (isset($message))
        <p class="text-default">{{ $message }}</p>
    @endif
    <br>
    <br>
    <a href="/">Clique para voltar para a página principal</a>

</div>
@endsection
