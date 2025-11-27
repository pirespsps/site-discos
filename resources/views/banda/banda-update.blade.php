@extends('layouts.edit',[
    'tags' => $tags,
    'cover' => $banda->path_img,
    'titulo' => $banda->nome,
    'ano' => $banda->ano,
    'usuario' => $banda->criador->user,
    'usuario_id' => $banda->criador->id,
    'multipleData' => $discos,
    'type' => 'banda',
    'id' => $banda->id,
])