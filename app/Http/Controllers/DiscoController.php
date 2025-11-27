<?php

namespace App\Http\Controllers;

use App\Models\Disco;
use App\Models\Track;
use DB;
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

        $userComment = GeneralOperations::getCommentary('disco',$disco->id);

        $comentarios = [];

        foreach($disco->comentarios as $comentario){
            
            if($comentario->id_user != $userComment->id_user){

                $comentarios[] = [
                    $comentario->id_user,
                    $comentario->usuario->user,
                    $comentario->usuario->path_img,
                    $comentario->texto
                ];
            }
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
            'comentarioUsuario' => $userComment,
            'nota' => $nota
        ]);
    }

    public function create(Request $request)
    {
        return view("disco.disco-create",[
            'bandas' => GeneralOperations::bandSelectQuery()
        ], ['tags' => GeneralOperations::tagSelectQuery()]);
    }

    public function store(Request $request)
    {

        $file = $request->file('fileInput');
        $fileName = time() . str_replace(' ','',trim($request->input('nome'))) . $file->getExtension();

        $file->store($fileName,'discos');

        $id = Disco::insertGetId([
            "titulo" => trim($request->input('nome')),
            "ano" => $request->input('ano'),
            "path_img" => "discos/$fileName",
            "id_criador" => session("user.id"),
            "id_banda" => $request->input('banda'),
        ]);

        $tracks = $request->input("track");
        $times = $request->input("time");

        $objArray = [];

        for($i = 0; $i<sizeof($tracks);$i++){
            if($tracks[$i] != null){
                $objArray[] = [
                    "nome" => $tracks[$i],
                    "duracao" => $times[$i],
                    "id_disco" => $id,
                ];    
            }
        }

        DB::table('tb_track')->insert($objArray);

        return redirect()->route('discos.show', ['disco' => $id]);
    }

    public function edit(Request $request, int $id)
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

        $dataFormatada = $duracaoTotal > (60 * 60) ? gmdate('H:i:s', $duracaoTotal) : gmdate('i:s', $duracaoTotal);

        return view("disco.disco-update", [
            'duracao' => $dataFormatada,
            'musicas' => $musicas,
            'disco' => $disco,
            'tags' => $tags,
            'bandas' => GeneralOperations::bandSelectQuery(),
        ]);
    }

    public function update(Request $request, int $id)
    {
        $titulo = $request->post('titulo');
        $ano = $request->post('ano');
        $banda = $request->post("banda");

        $disco = Disco::find($id);

        $disco->titulo = $titulo;
        $disco->ano = $ano;
        $disco->id_banda = $banda;

        foreach($request->post('campos') as $track){
            $t = Track::find($track[2]);
            
            if($t == null){
                Track::create(
                    [
                        "nome" => trim($track[0]),
                        "duracao" => $track[1],
                        "id_disco" => $id,
                    ]);
                continue;
            }

            if($t->nome != $track[0] || $t->duracao != strtotime($track[1])){
                $t->nome = trim($track[0]);
                $t->duracao = "00:" . trim($track[1]);

                $t->save();
            }
        }

        foreach ($request->post('remove') ?? [] as $idTrack) {
            Track::destroy($idTrack);
        }

        $disco->save();

        return "ok";
    }

    public function destroy(Request $request, int $id)
    {
        Disco::destroy($id);

        return redirect()->route("discos.index");
    }

    public function viewPOST(Request $request,int $id){
        GeneralOperations::viewPostHelper($request,$id,'disco');
    }

    public function removerComentario(Request $request, int $id){
        GeneralOperations::removerComentario('disco',$id);
    }

    public function pesquisa(Request $request, string $nome){

        $discos = Disco::with(['banda'])
        ->where('titulo','LIKE',"%$nome%")
        ->get();

        $discosArray = [];
        foreach($discos as $disco){
            $discosArray[] = [
                $disco->path_img,
                $disco->titulo,
                $disco->banda->nome,
                $disco->id
            ];
        }

        return view('disco.disco-list', ['discos' => $discosArray]);
    }

}
