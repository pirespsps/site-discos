<?php
namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Comentario;
use App\Models\Disco;
use App\Models\Banda;
use App\Models\Track;


class GeneralOperations
{

    public static function viewPostHelper(Request $request, int $id, string $obj)
    {

        $nota = $request->input('nota');
        $isFavorite = $request->input('isFavorite');
        $comentario = $request->input('comentario');
        $idUser = session('user.id');

        $exist = DB::table("tb_user_$obj")
            ->where('id_user', $idUser)
            ->where("id_$obj", $id)
            ->exists();

        $data = [
            'isLiked' => $isFavorite === null? false : ($isFavorite === ""? false : true),
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

            $idComentario = DB::table('tb_comentario')->insertGetId([
                'id_user' => $idUser,
                'texto' => trim($comentario)
            ]);

            DB::table("tb_comentario_$obj")->insert([
                'id_comentario' => $idComentario,
                "id_$obj" => $id
            ]);
        }
    }

}