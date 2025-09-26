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

    public function usuarios()
    {
        return $this->belongsToMany(
            Usuario::class,
            'tb_user_banda',
        'id_banda',
        'id_user')
        ->withPivot(['isLiked','isListened','hasCommentary','nota']);
    } //arrumar e criar no banco

    public function tags(){
        return $this->belongsToMany(Tag::class, 'tb_tag_banda','id_banda','id_tag');
    }

    public function comentarios(){
        return $this->belongsToMany(Comentario::class,'tb_comentario_banda','id_banda','id_comentario');
    }

    public static function showQuery($id){
        return $banda = Banda::with(['discos','criador','tags','comentarios'])->findOrFail($id);
    }

}
