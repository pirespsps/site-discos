<?php
namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Banda;
use App\Models\Tag;

class GeneralOperations
{

    public static function viewPostHelper(Request $request, int $id, string $obj)
    {

        $nota = $request->input('nota');
        $isFavorite = $request->input('isFavorite');
        echo $isFavorite;
        $comentario = $request->input('comentario');
        $idUser = session('user.id');

        $exist = DB::table("tb_user_$obj")
            ->where('id_user', $idUser)
            ->where("id_$obj", $id)
            ->exists();

        $data = [
            'isLiked' => $isFavorite == 1,
            'hasCommentary' => !empty($comentario),
            'nota' => $nota
        ];

        if($obj == "disco"){
            $data['isListened'] = true;
        }

        if ($exist) {
            DB::table("tb_user_$obj")
                ->where('id_user', $idUser)
                ->where("id_$obj", $id)
                ->update($data);

        } else {
            $data['id_user'] = $idUser;
            $data["id_$obj"] = $id;
            DB::table("tb_user_$obj")->insert($data);
        }

        if ($comentario != null && $comentario != "") {

            if(!$request->post('isEdit')){

                $idComentario = DB::table('tb_comentario')->insertGetId([
                    'id_user' => $idUser,
                    'texto' => trim($comentario)
                ]);

                DB::table("tb_comentario_$obj")->insert([
                    'id_comentario' => $idComentario,
                    "id_$obj" => $id
                ]);
            
            }else{
                $comentario = DB::table("tb_comentario_$obj")
                ->join('tb_comentario','id_comentario','=','tb_comentario.id')
                ->where('tb_comentario.id_user','=',session('user.id'))
                ->where("tb_comentario_$obj.id_$obj","=",$id)
                ->update(['texto' => trim($comentario)]);
            }
        }
    }

    public static function bandSelectQuery(){
        return Banda::all(["id","nome"]);
    }

    public static function tagSelectQuery(){
        return Tag::all(["id","value"]);
    }

    public static function getCommentary(string $obj,int $id){
        return DB::table("tb_comentario_$obj")
        ->join("tb_comentario","id_comentario","=","tb_comentario.id")
        ->where("id_$obj",$id)
        ->where('tb_comentario.id_user',session('user.id'))
        ->get()->first();
    }

    public static function removerComentario(string $obj, int $id){

        $comentario = DB::table("tb_comentario_$obj")
        ->join('tb_comentario',"id_comentario","=","tb_comentario.id")
        ->where("id_$obj",$id)
        ->where("tb_comentario.id_user",session('user.id'))
        ->first();

        DB::table("tb_user_$obj")
        ->where("id_$obj", "=",$id)
        ->where("id_user","=",session("user.id"))
        ->update(['hasCommentary' => false]);

        DB::table('tb_comentario')->delete($comentario->id);

    }

    private static function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
    
}

}