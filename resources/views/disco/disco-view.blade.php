@extends('layouts.view',[
    'tags' => $tags,
    'cover' => $disco->path_img,
    'duracao' => $duracao,
    'titulo' => $disco->titulo,
    'ano' => $disco->ano,
    'banda' => $disco->banda->nome,
    'banda_id' => $disco->banda->id,
    'usuario' => $disco->criador->user,
    'usuario_id' => $disco->criador->id,
    'isListened' => $isListened,
    'isLiked' => $isLiked,
    'hasCommentary' => $hasCommentary,
    'multipleData' => $musicas,
    'comentarios' => $comentarios,
    'type' => 'disco'
])

