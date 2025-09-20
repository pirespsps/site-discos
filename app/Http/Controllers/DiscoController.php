<?php

namespace App\Http\Controllers;

use App\Models\Disco;
use Exception;
use Illuminate\Http\Request;

class DiscoController extends Controller
{
    public function index(Request $request){


        
    }

    public function show(Request $request, int $id){
        
        try{
            $disco = Disco::findOrFail($id);
        }catch(Exception $e){
            return view('not-found');
        }

        $musicas = [
            ['música 1','duração'],
            ['música 2','duração'],
            ['música 3','duração'],
        ];

        $isListened = false; //inner join (mudar no banco depois para atributo na tbUserDisco)
        $isLiked = true; // --
        $hasCommentary = false; // --
        $duracao = "44:08"; //soma duração das músicas

        return view("disco.disco-view",[
            'isListened' => $isListened,
            'isLiked' => $isLiked,
            'hasCommentary' => $hasCommentary,
            'duracao' => $duracao,
            'musicas' => $musicas,
            'disco' => $disco
        ]);
    }

    public function create(Request $request){

        return view("");
    }

    public function store(Request $request){
        
        $disco = "salva o objeto";

        return redirect()->route('discos.show',['id' => $disco->id]);
    }

    public function edit(Request $request,int $id){

        try{
            $disco = Disco::findOrFail($id);
        }catch(Exception $e){
            //tratar erro
        }

        return view("",['disco' => $disco]);

    }

    public function update(Request $request, int $id){
        $disco = "update disco";

        return redirect()->route('discos.show',['id' => $disco->id]);
    }

    public function destroy(Request $request, int $id){
        Disco::destroy($id);

        return redirect()->route("discos.index");
    }
}
