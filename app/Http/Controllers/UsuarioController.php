<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Hash;


class UsuarioController extends Controller
{

    public const DEFAULT_NOTA = 0;
    public const DEFAULT_CARD_LIMIT = 5;

    public function index(Request $request)
    {

    }

    public function show(Request $request, int $id)
    {

        try {
            $usuario = Usuario::showQuery($id);
        } catch (Exception $e) {
            return view('erro', [
                'erro' => "Usuário não encontrado",
                'message' => $e->getMessage()
            ]);
        }

        $discos = [];
        $bandas = [];
        $logs = [];
        $currentBanda = 0;
        
        //discos são ordenados pelo id da banda
        foreach($usuario->discos as $disco){

            if($disco->pivot->nota != self::DEFAULT_NOTA){
                array_push($logs,[
                    'disco' => $disco->titulo,
                    'img' => $disco->path_img,
                    'id' => $disco->id,
                    'nota' => $disco->pivot->nota,
                    'isLiked' => $disco->pivot->isLiked,
                ]);
            }

            $discos[] = [$disco->titulo,$disco->path_img,$disco->id];
            
            $banda = $disco->banda;

            if($banda->id != $currentBanda){
                $bandas[$banda->id] = [$banda->nome,$banda->path_img,$banda->id];
                $currentBanda = $banda->id;
            }else{
                array_push($bandas[$currentBanda],[$banda->nome,$banda->path_img,$banda->id]); 
            }

        }

        $cards = $this->makeCards($usuario->discos);

        return view('usuario.usuario-view', [ //ordenar tudo por created_at depois, pagination
            'usuario' => $usuario,
            'cards' => $cards,
            'discos' => $discos,
            'bandas' => $bandas,
            'logs' => $logs,
            'comentarios_disco' => $usuario->comentarios_disco,
            'comentarios_banda' => $usuario->comentarios_banda,
            'comentarios_track' => $usuario->comentarios_track

        ]);
    }

    public function create(Request $request)
    {

        return view("");
    }

    public function store(Request $request)
    {

        $usuario = Usuario::find(1);

        return redirect()->route('usuarios.show', ['id' => $usuario->id]);
    }

    public function edit(Request $request, $id)
    {

        try {
            $usuario = Usuario::findOrFail($id);
        } catch (Exception $e) {
            return view('erro',['erro' => "Usuário não encontrado"]);
        }

        return view("usuario.usuario-edit", ['usuario' => $usuario]);

    }

    public function update(Request $request, int $id)
    {

        $request->validate(
            [
                'input-email' => 'required|email',
                'input-user' => 'required|min:6|max:25|unique:tb_user,user',
                'input-password' => 'same:text-confirmpassword|min:6|max:20',
                'path_img' => "mimes:png,jpg"
            ],
            [
                'input-user.required' => "O campo de usuário é obrigatório.",
                'input-user.min' => "Insira um usuário com mais de :min caracteres.",
                'input-user.max' => "Insira um usuário com menos de :max caracteres.",
                'input-user.unique' => "O nome de usuário já está em uso.",

                'input-email.required' => "O campo de e-mail é obrigatório.",
                'input-email.email' => "Insira um e-mail válido.",
                'input-email.unique' => "Uma conta já existe com o mesmo endereço de e-mail.",

                'input-password.required' => "O campo de senha é obrigatório.",
                'input-password.min' => "Insira uma senha com mais de :min caracteres.",
                'input-password.max' => "Insira uma senha com menos de :max caracteres.",
            ]
        );

        $user = Usuario::find($id);

        if($request->get('confirm-password') == null || !Hash::check(trim($request->get('confirm-password')), $user->senha)){
            return redirect()->back()->withInput()->with(['isPasswordRight' => "Senha não coincide"]);
        }

        $atributos = $request->post();

        $user->user = trim($atributos['input-user']);
        $user->email = trim($atributos['input-email']);

        //

        if(isset($atributos['input-password'])){
            $user->password = Hash::make(trim($atributos['input-password']));
        }

        if($request->file('path_img') !== null){
            
            $path = "images/usuarios/";
            $nomeArquivo = $user->id . "." . $request->file('path_img')->extension();
            $path .= $nomeArquivo;
            
            Storage::disk('local')->put($path, file_get_contents($request->file('path_img')));

            $user->path_img = $path;
        }

        $user->save();

        return redirect()->route('usuarios.show', ['usuario' => $user->id]);
    }

    public function destroy(Request $request, int $id)
    {
        Usuario::destroy($id);

        return redirect()->route("logout");
    }

    private function makeCards($discos, $limit = self::DEFAULT_CARD_LIMIT){

        $currentBand = 0;
        $cards = [];

        foreach($discos as $disco){

            if(sizeof($cards) >= $limit){
                break;
            }
            
            if($currentBand != $disco->banda->id){
                $cards[$disco->banda->id] = [
                'banda' => $disco->banda->nome,
                'banda_img' => $disco->banda->path_img,
                'banda_id' => $disco->banda->id,
                'discos' => [[$disco->titulo,$disco->path_img,$disco->id]]
            ];
            
            $currentBand = $disco->banda->id;

            }else{
                array_push($cards[$disco->banda->id]['discos'],[$disco->titulo,$disco->path_img,$disco->id]);
            }
        }

        return $cards;

    }
}
