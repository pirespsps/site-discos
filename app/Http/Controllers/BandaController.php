<?php

namespace App\Http\Controllers;

use App\Models\Banda;
use Exception;
use Illuminate\Http\Request;

class BandaController extends Controller
{
    public function index(Request $request){
        return view("");
    }

    public function show(Request $request, int $id){
        
        try{
            $banda = Banda::with(['discos','usuario'])->findOrFail($id);
        }catch(Exception $e){
            return view('not-found');
        }

        $discos = [];

        foreach($banda->discos as $disco){
            $discos[] = [$disco->titulo,$disco->ano,$disco->id];
        }

        $isLiked = $disco->isLiked;
        $hasCommentary = $banda->hasCommentary; 

        return view("banda.banda-view",[
            'isLiked' => $isLiked,
            'hasCommentary' => $hasCommentary,
            'discos' => $discos,
            'banda' => $banda,
        ]);

    }

    public function create(Request $request){

        return view("");
    }

    public function store(Request $request){
        
        $banda = "salva o objeto";

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
        $banda = "update banda";

        return redirect()->route('bandas.show',['id' => $banda->id]);
    }

    public function destroy(Request $request, int $id){
        Banda::destroy($id);

        return redirect()->route("bandas.index");
    }
}
