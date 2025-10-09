<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Exception;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{

    public const DEFAULT_NOTA = 0;
    public const DEFAULT_CARD_LIMIT = 5;

    public function index(Request $request)
    {

    }

    public function show(Request $request, int $id)
    {

        try {
            $usuario = Usuario::showQuery($id);
        } catch (Exception $e) {
            return view('erro', [
                'erro' => "Usuário não encontrado",
                'message' => $e->getMessage()
            ]);
        }

        $discos = [];
        $bandas = [];
        $logs = [];
        $currentBanda = 0;
        
        //discos são ordenados pelo id da banda
        foreach($usuario->discos as $disco){

            if($disco->pivot->nota != self::DEFAULT_NOTA){
                array_push($logs,[
                    'disco' => $disco->titulo,
                    'img' => $disco->path_img,
                    'id' => $disco->id,
                    'nota' => $disco->pivot->nota,
                    'isLiked' => $disco->pivot->isLiked,
                ]);
            }

            $discos[] = [$disco->titulo,$disco->path_img,$disco->id];
            
            $banda = $disco->banda;

            if($banda->id != $currentBanda){
                $bandas[$banda->id] = [$banda->nome,$banda->path_img,$banda->id];
                $currentBanda = $banda->id;
            }else{
                array_push($bandas[$currentBanda],[$banda->nome,$banda->path_img,$banda->id]); 
            }

        }

        $cards = $this->makeCards($usuario->discos);

        return view('usuario.usuario-view', [ //ordenar tudo por created_at depois, pagination
            'usuario' => $usuario,
            'cards' => $cards,
            'discos' => $discos,
            'bandas' => $bandas,
            'logs' => $logs,
            'comentarios_disco' => $usuario->comentarios_disco,
            'comentarios_banda' => $usuario->comentarios_banda,
            'comentarios_track' => $usuario->comentarios_track

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

    public function edit(Request $request, $id)
    {

        try {
            $usuario = Usuario::findOrFail($id);
        } catch (Exception $e) {
            return view('erro',['erro' => "Usuário não encontrado"]);
        }

        return view("usuario.usuario-edit", ['usuario' => $usuario]);

    }

    public function update(Request $request, int $id)
    {
        var_dump($request->session());

        return redirect()->route('usuarios.show', ['id' => $usuario->id]);
    }

    public function destroy(Request $request, int $id)
    {
        Usuario::destroy($id);

        return redirect()->route("usuarios.index");
    }

    private function makeCards($discos, $limit = self::DEFAULT_CARD_LIMIT){

        $currentBand = 0;
        $cards = [];

        foreach($discos as $disco){

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
