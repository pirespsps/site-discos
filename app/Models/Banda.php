<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banda extends Model
{

    protected $table = 'tb_banda';

    public function discos()
    {
        return $this->hasMany(Disco::class, 'id_banda');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class,'id_criador','id');
    }

    // public function comentarios(){
    //     return $this->hasManyThrough(Comentario::class,'','','','');
    // } fazer depois

    

}
