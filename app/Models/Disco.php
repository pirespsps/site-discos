<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Disco extends Model
{
    protected $table = 'tb_disco';

    public static function searchByUser($id)
    {
        return DB::table('tb_disco')
            ->join('tb_user_disco', 'tb_disco.id', '=', 'tb_user_disco.id_disco')
            ->select('tb_disco.*')
            ->where('tb_user_disco.user_id', $id)
            ->limit(20)
            ->get();
    }

}
