<?php

namespace App\Http\Controllers;

use App\Models\Track;
use Illuminate\Http\Request;

class TrackController extends Controller{

    public function index(Request $request){
        
    }

    public function show(Request $request, int $id){

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
}
