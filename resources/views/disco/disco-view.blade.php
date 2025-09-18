@extends('layouts.view')

@section('body')

@endsection

@section('cover')
    {{ $disco->path_img }}
@endsection

@section('generos')
    Grunge, Metal
@endsection

@section('duracao')
    {{ $duracao }}
@endsection

@section('titulo')
    {{ $disco->titulo }}
@endsection

@section('ano')
    {{ $disco->ano }}
@endsection

@section('banda')
    Banda
@endsection

@section('usuario')
    Usuário
@endsection