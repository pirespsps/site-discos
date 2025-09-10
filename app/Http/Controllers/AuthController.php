<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Models\Usuario;

class AuthController extends Controller
{

    public function cadastro(Request $request){

        return view("cadastro");
    }
    public function cadastroEntrar(Request $request)
    {
        $request->validate(
            [
                'text-email' => 'required|email|unique:tb_user,email',
                'text-user' => 'required|min:6|max:25|unique:tb_user,user',
                'text-password' => 'required_with:text-confirmpassword|same:text-confirmpassword|min:6|max:20',
            ],
            [
                'text-user.required' => "O campo de usuário é obrigatório.",
                'text-user.min' => "Insira um usuário com mais de :min caracteres.",
                'text-user.max' => "Insira um usuário com menos de :max caracteres.",
                'text-user.unique' => "O nome de usuário já está em uso.",

                'text-email.required' => "O campo de e-mail é obrigatório.",
                'text-email.email' => "Insira um e-mail válido.",
                'text-email.unique' => "Uma conta já existe com o mesmo endereço de e-mail.",

                'text-passoword.required' => "O campo de senha é obrigatório.",
                'text-passoword.min' => "Insira uma senha com mais de :min caracteres.",
                'text-passoword.max' => "Insira uma senha com menos de :max caracteres.",
                'text-password.same' => "O campo de confirmação da senha não corresponde a senha"
            ]
        );

        $usuarioStr = trim($request->input('text-user'));
        $email = trim($request->input('text-email'));
        $senha = trim($request->input('text-password'));

        $senha = password_hash($senha,PASSWORD_ARGON2ID);

        $usuario = new Usuario();
        $usuario->user = $usuarioStr;
        $usuario->email = $email;
        $usuario->senha = $senha;

        $usuario->save();

        Cookie::queue('conta',$usuario->id,60*24*365);

        return view('index');

    }

    public function login(Request $request)
    {

        return view("login",['isLoginFailed' => false]);
    }


    public function loginEntrar(Request $request)
    {

        $request->validate(
            [
                'text-user' => 'required|exists:tb_user,user',
                'text-password' => 'required',
            ],
            [
                'text-user.required' => "O campo de usuário é obrigatório.",
                'text-user.exists' => 'O usuário não está cadastrado.',

                'text-password.required' => "O campo de senha é obrigatório.",
            ]
        );

        $user = trim($request->input('text-user'));
        $senha = trim($request->input('text-password'));

        $usuario = Usuario::searchByUser($user);

        if(!password_verify($senha,$usuario->senha)){
            return view('login',['isLoginFailed' => true]);
        }

        Cookie::queue('conta',$usuario->id,60*24*365);

        return view('index');

    }


    public function logout(Request $request){
        Cookie::queue(Cookie::forget('conta'));
        $request->session()->flush();

        return view('index');
    }

}
