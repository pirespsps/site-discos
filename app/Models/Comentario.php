<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $table = 'tb_comentario';

    public function disco(){
        return $this->belongsToMany(
            Disco::class,
            'tb_comentario_disco',
            'id_comentario',
            'id_disco'
        );
    }

    public function banda(){
        return $this->belongsToMany(
            Banda::class,
            'tb_comentario_banda',
            'id_comentario',
            'id_banda'
        );
    }

    public function track(){
        return $this->belongsToMany(
            Track::class,
            'tb_comentario_track',
            'id_comentario',
            'id_track'
        )
        ->with('disco');
    }

    public function usuario(){
        return $this->belongsTo(Usuario::class,'id_user','id');
    } 
}
