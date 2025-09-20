@extends('layouts.view',[
    'objeto' => $disco,
    'generos' => "Grunge, Metal",
    'cover' => $disco->path_img,
    'duracao' => $duracao,
    'titulo' => $disco->titulo,
    'ano' => $disco->ano,
    'banda' => "Banda",
    'usuario' => "Usuário",
    'isListened' => $isListened,
    'isLiked' => $isLiked,
    'hasCommentary' => $hasCommentary,
    'multipleData' => $musicas
])