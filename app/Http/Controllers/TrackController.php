<?php

namespace App\Http\Controllers;

use App\Models\Track;
use Carbon\Carbon;
use Exception;
use GeneralOperations;
use Illuminate\Http\Request;

class TrackController extends Controller{

    public function index(Request $request){
        
    }

    public function show(Request $request, int $id){

        try{
            $track = Track::showQuery($id,session()->get('user.id'));
        }catch(Exception $e){
            return view('erro', [
                'erro' => "Track não encontrada",
                'message' => $e->getMessage()
            ]);
        }

        $tags = [];

        foreach($track->disco->tags as $tag){
            $tags[] = $tag->value;
        }

        $comentarios = [];

        foreach($track->comentarios as $comentario){
            $comentarios[] = [
                $comentario->id_user,
                $comentario->usuario->user,
                $comentario->usuario->path_img,
                $comentario->texto
            ];
        }

        if($track->disco->usuario != null){

            $isListened = $track->disco->usuario->pivot->isListened;
            $isLiked = $track->disco->usuario->pivot->isLiked;
        }else{
            $isListened = false;
            $isLiked = false;
        }

        $duracao = new Carbon($track->duracao);

        $duracaoFormatada = $track->duracao > (60 * 60) ? $duracao->format('H:i:s') : $duracao->format('i:s');

        return view('track.track-view',[
            'track' => $track,
            'tags' => $tags,
            'comentarios' => $comentarios,
            'isListened' => $isListened,
            'isLiked' => $isLiked,
            'duracao' => $duracaoFormatada
        ]);
    }

    public function create(Request $request){

        return view("");
    }

    public function store(Request $request){
        
        $track = Track::find(1);

        return redirect()->route('tracks.show',['id' => $track->id]);
    }

    public function edit(Request $request,int $id){

        try{
            $track = Track::findOrFail($id);
        }catch(Exception $e){
            //tratar erro
        }

        return view("",['track' => $track]);

    }

    public function update(Request $request, int $id){
        $track = Track::find(1);

        return redirect()->route('tracks.show',['id' => $track->id]);
    }

    public function destroy(Request $request, int $id){
        Track::destroy($id);

        return redirect()->route("tracks.index");
    }

    public function viewPOST(Request $request,int $id){
        GeneralOperations::viewPostHelper($request,$id,'track');
    }
}
