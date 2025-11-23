<?php

namespace App\Http\Controllers;

use App\Models\Banda;
use Exception;
use GeneralOperations;
use Illuminate\Http\Request;

class BandaController extends Controller
{
    public function index(Request $request){
       $bandas = Banda::all();

        $bandasArray = [];
        foreach($bandas as $banda){
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

    public function show(Request $request, int $id){

        try{
            $banda = Banda::showQuery($id,session()->get('user.id'));
        }catch(Exception $e){
            return view('erro', [
                'erro' => "Banda não encontrada",
                'message' => $e->getMessage()
            ]);
        }

        $tags = [];

        foreach($banda->tags as $tag){
            $tags[] = $tag->value;
        }

        $discos = [];

        foreach($banda->discos as $disco){
            $discos[] = [$disco->titulo,$disco->ano,$disco->id];
        }

        $comentarios = [];

        foreach($banda->comentarios as $comentario){
            $comentarios[] = [
                $comentario->id_user,
                $comentario->usuario->user,
                $comentario->usuario->path_img,
                $comentario->texto
            ];
        }

        if($banda->usuario != null){

            $isLiked = $banda->usuario->pivot->isLiked; //arruma pra pegar certo que nem no disco
            $hasCommentary = $banda->usuario->pivot->hasCommentary;
        
        }else{
            $isLiked = false;
            $hasCommentary = false;
        }

        return view("banda.banda-view",[
            'isLiked' => $isLiked,
            'hasCommentary' => $hasCommentary,
            'discos' => $discos,
            'banda' => $banda,
            'tags' => $tags,
            'comentarios' => $comentarios,
        ]);

    }

    public function create(Request $request){

        return view("");
    }

    public function store(Request $request){
        
        $banda = Banda::find(1);

        return redirect()->route('bandas.show',['id' => $banda->id]);
    }

    public function edit(Request $request,int $id){

        try{
            $banda = Banda::findOrFail($id);
        }catch(Exception $e){
            //tratar erro
        }

        return view("",['banda' => $banda]);

    }

    public function update(Request $request, int $id){
        $banda = Banda::find(1);

        return redirect()->route('bandas.show',['id' => $banda->id]);
    }

    public function destroy(Request $request, int $id){
        Banda::destroy($id);

        return redirect()->route("bandas.index");
    }

    public function viewPOST(Request $request,int $id){
        GeneralOperations::viewPostHelper($request,$id,'banda');
    }
}
