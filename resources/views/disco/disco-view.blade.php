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
