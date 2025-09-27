<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Exception;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index(Request $request)
    {

    }

    public function show(Request $request, int $id)
    {

        try {
            $usuario = Usuario::showQuery($id);
        } catch (Exception $e) {
            return view('not-found', ['erro' => $e]);
        }

        $cards = $this->makeCards($usuario->discos);

        return view('usuario.usuario-view', [
            'usuario' => $usuario,
            'cards' => $cards
        ]);
    }

    public function create(Request $request)
    {

        return view("");
    }

    public function store(Request $request)
    {

        $usuario = Usuario::find(1);

        return redirect()->route('usuarios.show', ['id' => $usuario->id]);
    }

    public function edit(Request $request, int $id)
    {

        try {
            $usuario = Usuario::findOrFail($id);
        } catch (Exception $e) {
            //tratar erro
        }

        return view("", ['usuario' => $usuario]);

    }

    public function update(Request $request, int $id)
    {
        $usuario = Usuario::find(1);

        return redirect()->route('usuarios.show', ['id' => $usuario->id]);
    }

    public function destroy(Request $request, int $id)
    {
        Usuario::destroy($id);

        return redirect()->route("usuarios.index");
    }

    private function makeCards($discos){

        $currentBand = 0;
        $cards = [];

        foreach($discos as $disco){
            
            if($currentBand != $disco->banda->id){
                $cards[$disco->banda->id] = [
                'banda' => $disco->banda->nome,
                'banda_img' => $disco->banda->path_img,
                'banda_id' => $disco->banda->id,
                'discos' => [[$disco->titulo,$disco->path_img,$disco->id]]
            ];
            
            $currentBand = $disco->banda->id;

            }else{
                array_push($cards[$disco->banda->id]['discos'],[$disco->titulo,$disco->path_img,$disco->id]);
            }
        }

        return $cards;

    }
}
