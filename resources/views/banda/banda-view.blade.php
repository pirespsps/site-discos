@extends('layouts.view',[
    'tags' => $tags,
    'cover' => $banda->path_img,
    'titulo' => $banda->nome,
    'ano' => $banda->ano,
    'usuario' => $banda->criador->user,
    'usuario_id' => $banda->criador->id,
    'isLiked' => $isLiked,
    'hasCommentary' => $hasCommentary,
    'multipleData' => $discos,
    'comentarios' => $comentarios,
    'type' => 'banda'
])

