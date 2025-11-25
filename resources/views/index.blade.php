@extends('layouts.principal-layout')
@include('layouts.header')

@section('content')

<div class="d-flex h-100 w-100">

    <div class = "d-flex w-100 h-25 mt-5 px-5 justify-content-start row">
        @if (session()->get('user','notLogged') != "notLogged" )
            <a class="text-light text-decoration-none mb-3">Seus Discos</a>
        @else
            <a class="text-light text-decoration-none mb-3">Últimos Discos</a>        
        @endif
        <hr class="mx-2">
        <div class="d-flex column overflow-auto">
            @foreach ($discos as $disco)
                <div class = "container h-25 p-3">
                    <a href="discos/{{ $disco->id }}" class="text-decoration-none">
                    <img class="disco" src="{{ asset("storage/" . $disco->path_img) }}">
                    <p class="text-center text-white">{{ $disco->titulo }} </p>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
