<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index(Request $request){

    }

    public function show(Request $request, int $id){

    }

    public function create(Request $request){

        return view("");
    }

    public function store(Request $request){
        
        $usuario = Usuario::find(1);

        return redirect()->route('usuarios.show',['id' => $usuario->id]);
    }

    public function edit(Request $request,int $id){

        try{
            $usuario = Usuario::findOrFail($id);
        }catch(Exception $e){
            //tratar erro
        }

        return view("",['usuario' => $usuario]);

    }

    public function update(Request $request, int $id){
        $usuario = Usuario::find(1);

        return redirect()->route('usuarios.show',['id' => $usuario->id]);
    }

    public function destroy(Request $request, int $id){
        Usuario::destroy($id);

        return redirect()->route("usuarios.index");
    }
}
