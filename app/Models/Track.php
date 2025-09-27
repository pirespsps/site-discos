<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Track extends Model
{

    public function disco(){
        return $this->belongsTo(Disco::class,'id_disco');
    }

    public function comentarios(){
        return $this->belongsToMany(Comentario::class,'tb_comentario_track','id_track','id_comentario');
    }

    protected $table = 'tb_track';

    public static function showQuery($id,$id_user){
        $track =  Track::with(['disco','comentarios'])->findOrFail($id);

        $track->disco->with(['banda','tags','criador','usuario']);
        $track->disco->usuario = $track->disco->usuario->find($id_user);

        return $track;
    }
    
}
