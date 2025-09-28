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

        $bandas = [];
        $currentBanda = 0;
        
        //discos são ordenados pelo id da banda
        foreach($usuario->discos as $disco){
            
            $banda = $disco->banda;

            if($banda->id != $currentBanda){
                $bandas[$banda->id] = [$banda->nome,$banda->path_img,$banda->id];
                $currentBanda = $banda->id;
            }else{
                array_push($bandas[$currentBanda],[$banda->nome,$banda->path_img,$banda->id]); 
            }

        }

        $discos = [];

        foreach($usuario->discos as $disco){
            $discos[] = [$disco->titulo,$disco->path_img,$disco->id];
        }

        $cards = $this->makeCards($usuario->discos);

        return view('usuario.usuario-view', [
            'usuario' => $usuario,
            'cards' => $cards,
            'discos' => $discos,
            'bandas' => $bandas,
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

    private function makeCards($discos, $limit = 5){

        $currentBand = 0;
        $cards = [];

        foreach($discos as $disco){ //ordernar por created_at depois

            if(sizeof($cards) >= $limit){
                break;
            }
            
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
