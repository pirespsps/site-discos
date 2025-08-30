<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller{

    public function cadastro(Request $request){

        return view("cadastro");
    }
    public function cadastroEntrar(Request $request){
        
    }

    public function login(Request $request){

        return view("login");
    }

    
    public function loginEntrar(Request $request){

    }

    
    public function logout(Request $request){

    }

}
