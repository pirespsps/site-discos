<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'tb_user';

    public static function searchByEmail($email){
        return self::where('email',$email)->get()->first();
    }
    
}
