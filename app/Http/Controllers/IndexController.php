<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Disco;

class IndexController extends Controller
{
    public function index(Request $request){

        $discos = Disco::searchByUser((int)$request->cookie('conta'));

        return view("index",['discos' => $discos]);
    }
}
