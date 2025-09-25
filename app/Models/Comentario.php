<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comentario extends Model
{
    protected $table = 'tb_comentario';

    public function usuario(){
        return $this->belongsTo(Usuario::class,'id_user','id');
    } 
}
