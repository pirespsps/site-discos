<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Disco;
use App\Models\Usuario;

class IndexController extends Controller
{
    public function index(Request $request){

        $usuario = Usuario::find((int)$request->cookie('conta'));
        $discos = Disco::searchByUser((int)$request->cookie('conta'));

        return view("index",['discos' => $discos]);
    }
}
