@extends('layouts.view',[
    'tags' => $tags,
    'cover' => $track->disco->path_img,
    'duracao' => $duracao,
    'titulo' => $track->nome,
    'ano' => $track->disco->ano,
    'banda' => $track->disco->banda->nome,
    'banda_id' => $track->disco->banda->id,
    'usuario' => $track->disco->criador->user,
    'usuario_id' => $track->disco->criador->id,
    'isListened' => $isListened,
    'isLiked' => $isLiked,
    'disco' => $track->disco->titulo,
    'disco_id' => $track->disco->id,
    'comentarios' => $comentarios,
    'type' => 'track',
    'id' => $track->id
])

