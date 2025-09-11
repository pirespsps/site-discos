<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Disco;
use App\Models\Usuario;

class IndexController extends Controller
{
    public function index(Request $request){

        $usuario = Usuario::find((int)$request->session('')->get('user.id'));

        $discos = $usuario ? Disco::searchByUser($usuario->id) : Disco::defaultDiscoQuery();

        return view("index",['discos' => $discos]);
    }
}
