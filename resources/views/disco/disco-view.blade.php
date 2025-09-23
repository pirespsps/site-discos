@extends('layouts.view',[
    'generos' => "Grunge, Metal",
    'cover' => $disco->path_img,
    'duracao' => $duracao,
    'titulo' => $disco->titulo,
    'ano' => $disco->ano,
    'banda' => $disco->banda->nome,
    'banda_id' => $disco->banda->id,
    'usuario' => $disco->creator->user,
    'usuario_id' => $disco->creator->id,
    'isListened' => $isListened,
    'isLiked' => $isLiked,
    'hasCommentary' => $hasCommentary,
    'multipleData' => $musicas,
    'type' => 'disco'
])

