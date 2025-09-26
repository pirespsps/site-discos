<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'tb_user';

    public function discos(){
        return $this->belongsToMany(
            Usuario::class,
            'tb_user_disco',
        'id_user',
        'id_disco')
        ->withPivot(['isLiked','isListened','hasCommentary','nota']);
    }

    public static function searchByUser($user){
        return self::where('user',$user)->get()->first();
    }
    
}
