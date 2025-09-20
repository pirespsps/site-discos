@extends('layouts.view',[
    'generos' => "Grunge, Metal",
    'cover' => $banda->path_img,
    'titulo' => $banda->nome,
    'ano' => $banda->ano,
    'usuario' => $banda->usuario->user,
    'usuario_id' => $banda->usuario->id,
    'isLiked' => $isLiked,
    'hasCommentary' => $hasCommentary,
    'multipleData' => $discos,
    'type' => 'banda'
])

