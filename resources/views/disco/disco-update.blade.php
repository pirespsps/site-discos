@extends('layouts.edit',[
    'tags' => $tags,
    'cover' => $disco->path_img,
    'duracao' => $duracao,
    'titulo' => $disco->titulo,
    'ano' => $disco->ano,
    'banda' => $disco->banda->nome,
    'banda_id' => $disco->banda->id,
    'usuario' => $disco->criador->user,
    'usuario_id' => $disco->criador->id,
    'multipleData' => $musicas,
    'type' => 'disco',
    'id' => $disco->id,
    'bandas' => $bandas
])