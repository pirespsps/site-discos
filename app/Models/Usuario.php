<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Usuario extends Model
{
    protected $table = 'tb_user';

    public function discos()
    {
        return Usuario::belongsToMany(
            Disco::class,
            'tb_user_disco',
            'id_user',
            'id_disco',
        )
            ->withPivot(['isLiked', 'nota'])
            ->with('banda')
            ->orderBy('tb_disco.id_banda');
    }

    public function comentarios_disco()
    {
        return $this->hasMany(
            Comentario::class,
            'id_user'
        )
            ->join(
                'tb_comentario_disco',
                'tb_comentario.id',
                'id_comentario'
            )
            ->with('disco');
    }

    public function comentarios_banda()
    {
        return $this->hasMany(
            Comentario::class,
            'id_user'
        )
            ->join(
                'tb_comentario_banda',
                'tb_comentario.id',
                'id_comentario'
            )
            ->with('banda');
    }

    public function comentarios_track()
    {
        return $this->hasMany(
            Comentario::class,
            'id_user'
        )
            ->join(
                'tb_comentario_track',
                'tb_comentario.id',
                'id_comentario'
            )
            ->with('track');
    }

    public static function searchByUser($user)
    {
        return self::where('user', $user)->get()->first();
    }

    public static function showQuery($id)
    {
        $usuario = Usuario::with(['discos', 'comentarios_disco','comentarios_banda','comentarios_track'])
            ->findOrFail($id);

        //$usuario->discos = $usuario->discos->sortByDesc('created_at');

        return $usuario;

    }

}
