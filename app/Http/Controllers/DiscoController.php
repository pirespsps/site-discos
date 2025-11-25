<?php

namespace App\Http\Controllers;

use App\Models\Disco;
use Exception;
use App\Services\GeneralOperations;
use Illuminate\Http\Request;

class DiscoController extends Controller
{
    public function index(Request $request)
    {

        $discos = Disco::with(['banda'])->get();

        $discosArray = [];
        foreach($discos as $disco){
            $discosArray[] = [
                $disco->path_img,
                $disco->titulo,
                $disco->banda->nome,
                $disco->id
            ];
        }
        //fazer com pagination..

        return view('disco.disco-list', ['discos' => $discosArray]);
    }

    public function show(Request $request, int $id)
    {

        try{
            $disco = Disco::showQuery($id,session('user.id'));
        }catch(Exception $e){
            return view('erro', [
                'erro' => "Disco não encontrado",
                'message' => $e->getMessage()
            ]);
        }

        $tags = [];

        foreach($disco->tags as $tag){
            $tags[] = $tag->value;
        }

        $musicas = [];
        $duracaoTotal = 0;

        foreach ($disco->tracks as $track) {
            [$h, $m, $s] = explode(':', $track->duracao);

            $musicas[] = [$track->nome, sprintf('%02d:%02d', $m, $s), $track->id];

            $duracaoTotal += $h * 60 * 60 + $m * 60 + $s;
        }

        $comentarios = [];

        foreach($disco->comentarios as $comentario){
            $comentarios[] = [
                $comentario->id_user,
                $comentario->usuario->user,
                $comentario->usuario->path_img,
                $comentario->texto
            ];
        }

        if($disco->usuario != null){

            $isListened = $disco->usuario->pivot->isListened;
            $isLiked = $disco->usuario->pivot->isLiked;
            $hasCommentary = $disco->usuario->pivot->hasCommentary;
            $nota = $disco->usuario->pivot->nota;

        }else{
            $isListened = false;
            $isLiked = false;
            $hasCommentary = false;
            $nota = 0;
        }

        $dataFormatada = $duracaoTotal > (60 * 60) ? gmdate('H:i:s', $duracaoTotal) : gmdate('i:s', $duracaoTotal);

        return view("disco.disco-view", [
            'isListened' => $isListened,
            'isLiked' => $isLiked,
            'hasCommentary' => $hasCommentary,
            'duracao' => $dataFormatada,
            'musicas' => $musicas,
            'disco' => $disco,
            'tags' => $tags,
            'comentarios' => $comentarios,
            'nota' => $nota
        ]);
    }

    public function create(Request $request)
    {

        return view("");
    }

    public function store(Request $request)
    {

        dd($request->input());

        $disco = Disco::find(1);

        return redirect()->route('discos.show', ['id' => $disco->id]);
    }

    public function edit(Request $request, int $id)
    {

        try {
            $disco = Disco::findOrFail($id);
        } catch (Exception $e) {
            //tratar erro
        }

        return view("", ['disco' => $disco]);

    }

    public function update(Request $request, int $id)
    {
        $disco = Disco::find(1);

        return redirect()->route('discos.show', ['id' => $disco->id]);
    }

    public function destroy(Request $request, int $id)
    {
        Disco::destroy($id);

        return redirect()->route("discos.index");
    }

    public function viewPOST(Request $request,int $id){
        GeneralOperations::viewPostHelper($request,$id,'disco');
    }
}
