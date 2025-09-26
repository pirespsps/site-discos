<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Disco extends Model
{
    protected $table = 'tb_disco';

    public function banda(){
        return $this->belongsTo(Banda::class,'id_banda');
    }

    public function tracks()
    {
        return $this->hasMany(Track::class, 'id_disco');
    }

    public function tags(){
        return $this->belongsToMany(Tag::class, 'tb_tag_disco','id_disco','id_tag');
    }

    public function comentarios(){
        return $this->belongsToMany(Comentario::class,'tb_comentario_disco','id_disco','id_comentario');
    } 

    public function criador()
    {
        return $this->belongsTo(Usuario::class,'id_criador','id');
    }

    public function usuario()
    {
        return $this->belongsToMany(
            Usuario::class,
            'tb_user_disco',
        'id_disco',
        'id_user')
        ->withPivot(['isLiked','isListened','hasCommentary','nota']);
    }

    public static function searchByUser($id)
    {
        return DB::table('tb_disco')
            ->join('tb_user_disco', 'tb_disco.id', '=', 'tb_user_disco.id_disco')
            ->select('tb_disco.*')
            ->where('tb_user_disco.id_user', $id)
            ->limit(20)
            ->get();
    }

    public static function defaultDiscoQuery()
    {
        return DB::table('tb_disco')
            ->select('tb_disco.*')
            ->limit('20')
            ->get();
    }

    public static function showQuery($id,$id_user){
            return Disco::with(['banda', 'tracks', 'criador','usuario','tags','comentarios'])
            ->findOrFail($id);
        }

}
