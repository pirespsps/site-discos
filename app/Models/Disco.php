<?php

namespace App\Models;

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

    // public function comentarios(){
    //     return $this->hasManyThrough(Comentario::class,'','','','');
    // } fazer depois

    public function usuario()
    {
        return $this->belongsTo(Usuario::class,'id_criador','id');
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

}
