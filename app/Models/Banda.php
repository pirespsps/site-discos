<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Model;

class Banda extends Model
{

    protected $table = 'tb_banda';

    public function discos()
    {
        return $this->hasMany(Disco::class, 'id_banda');
    }

    public function criador()
    {
        return $this->belongsTo(Usuario::class,'id_criador','id');
    }

    public function usuario()
    {
        return $this->belongsToMany(
            Usuario::class,
            'tb_user_banda',
        'id_banda',
        'id_user')
        ->withPivot(['isLiked','hasCommentary','nota']);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class, 'tb_tag_banda','id_banda','id_tag');
    }

    public function comentarios(){
        return $this->belongsToMany(Comentario::class,'tb_comentario_banda','id_banda','id_comentario');
    }

    public static function showQuery($id,$id_user = 0){
        $banda = Banda::with(['discos','criador','tags','comentarios','usuario'])
        ->findOrFail($id);
        $id_user != 0? $banda->usuario = $banda->usuario->find($id_user) : $banda->usuario = null;
        
        return $banda;
    }

}
