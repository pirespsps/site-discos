@extends('layouts.view',[
    'generos' => "Grunge, Metal",
    'cover' => $disco->path_img,
    'duracao' => $duracao,
    'titulo' => $disco->titulo,
    'ano' => $disco->ano,
    'banda' => $disco->banda->nome,
    'banda_id' => $disco->banda->id,
    'usuario' => $disco->usuario->user,
    'usuario_id' => $disco->usuario->id,
    'isListened' => $isListened,
    'isLiked' => $isLiked,
    'hasCommentary' => $hasCommentary,
    'multipleData' => $musicas,
    'type' => 'disco'
])

