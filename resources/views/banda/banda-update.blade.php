@extends('layouts.edit',[
'titulo' => "Atualizar banda",
'type' => "banda",
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
'type' => 'banda',
'id' => $banda->id,
'nota' => $nota,
'comentarioUsuario' => $comentarioUsuario
])