@extends('layouts.view',[
    'tags' => $tags,
    'cover' => $banda->path_img,
    'titulo' => $banda->nome,
    'ano' => $banda->ano,
    'usuario' => $banda->creator->user,
    'usuario_id' => $banda->creator->id,
    'isLiked' => $isLiked,
    'hasCommentary' => $hasCommentary,
    'multipleData' => $discos,
    'type' => 'banda'
])

