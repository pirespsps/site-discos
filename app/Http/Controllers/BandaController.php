<?php

namespace App\Http\Controllers;

use App\Models\Banda;
use Exception;
use App\Services\GeneralOperations;
use Illuminate\Container\Attributes\Storage;
use Illuminate\Http\Request;

class BandaController extends Controller
{
    public function index(Request $request)
    {
        $bandas = Banda::all();

        $bandasArray = [];
        foreach ($bandas as $banda) {
            $bandasArray[] = [
                $banda->path_img,
                $banda->nome,
                $banda->ano,
                $banda->id
            ];
        }
        //fazer com pagination..

        return view('banda.banda-list', ['bandas' => $bandasArray]);
    }

    public function show(Request $request, $id)
    {

        try {
            $banda = Banda::showQuery($id, session()->get('user.id'));
        } catch (Exception $e) {
            return view('erro', [
                'erro' => "Banda não encontrada",
                'message' => $e->getMessage()
            ]);
        }

        $tags = [];

        foreach ($banda->tags as $tag) {
            $tags[] = $tag->value;
        }

        $discos = [];

        foreach ($banda->discos as $disco) {
            $discos[] = [$disco->titulo, $disco->ano, $disco->id];
        }

        $userComment = GeneralOperations::getCommentary('banda',$banda->id);

        $comentarios = [];

        foreach($banda->comentarios as $comentario){
            
            if($comentario->id_user != $userComment->id_user){

                $comentarios[] = [
                    $comentario->id_user,
                    $comentario->usuario->user,
                    $comentario->usuario->path_img,
                    $comentario->texto
                ];
            }
        }

        if ($banda->usuario != null) {

            $isLiked = $banda->usuario->pivot->isLiked;
            $hasCommentary = $banda->usuario->pivot->hasCommentary;
            $nota = $banda->usuario->pivot->nota;

        } else {

            $isLiked = false;
            $hasCommentary = false;
            $nota = 0;

        }

        return view("banda.banda-view", [
            'isLiked' => $isLiked,
            'hasCommentary' => $hasCommentary,
            'nota' => $nota,
            'discos' => $discos,
            'banda' => $banda,
            'tags' => $tags,
            'comentarios' => $comentarios,
            'comentarioUsuario' => $userComment,
        ]);

    }

    public function create(Request $request)
    {

        return view("banda.banda-create",[
            
        ]);
    }

    public function store(Request $request)
    {

        $file = $request->file('fileInput');
        $extension = $file->getClientOriginalExtension();
        $fileName = time() . str_replace(' ','',trim($request->input('nome'))) . ".$extension";

        $file->storeAs('',$fileName,'bandas');

        $id = Banda::insertGetId(
            [
                'nome' => trim($request->input('nome')),
                'local' => trim($request->input('local')),
                'ano' => $request->input('ano'),
                'path_img' => "bandas/$fileName",
                'id_criador' => session('user.id'),
            ]
            );

        return redirect()->route('bandas.show', ['banda' => $id]);
    }

    public function edit(Request $request, int $id)
    {

        try {
            $banda = Banda::findOrFail($id);
        } catch (Exception $e) {
            //tratar erro
        }

        return view("", ['banda' => $banda]);

    }

    public function update(Request $request, int $id)
    {
        $banda = Banda::find(1);

        return redirect()->route('bandas.show', ['id' => $banda->id]);
    }

    public function destroy(Request $request, int $id)
    {
        Banda::destroy($id);

        return redirect()->route("bandas.index");
    }

    public function viewPOST(Request $request, int $id)
    {
        GeneralOperations::viewPostHelper($request, $id, 'banda');
    }

    public function removerComentario(Request $request, int $id){
        GeneralOperations::removerComentario('banda',$id);
    }

    public function pesquisa(Request $request, string $nome){
        
        $bandas = Banda::where('nome','LIKE',"%$nome%")
        ->get();

        $bandasArray = [];
        foreach ($bandas as $banda) {
            $bandasArray[] = [
                $banda->path_img,
                $banda->nome,
                $banda->ano,
                $banda->id
            ];
        }

        return view('banda.banda-list',[
            'bandas' => $bandasArray
        ]);
    }
}
