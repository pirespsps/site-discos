<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class tb_user_disco_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tb_user_disco')->insert([
            [
                'id_user' => '1',
                'id_disco' => '1',
                'nota' => 1,
                'isLiked' => true,
            ],
            [
                'id_user' => '1',
                'id_disco' => '2',
                'nota' => 2,
                'isLiked' => false,
            ],
            [
                'id_user' => '1',
                'id_disco' => '3',
                'nota' => 3,
                'isLiked' => true,
            ],
            [
                'id_user' => '1',
                'id_disco' => '4',
                'nota' => 4,
                'isLiked' => false,
            ],
            [
                'id_user' => '1',
                'id_disco' => '5',
                'nota' => 5,
                'isLiked' => false,
            ],
            [
                'id_user' => '1',
                'id_disco' => '6',
                'nota' => 4,
                'isLiked' => true,
            ],
            [
                'id_user' => '1',
                'id_disco' => '7',
                'nota' => 3,
                'isLiked' => true,
            ],[
                'id_user' => '1',
                'id_disco' => '8',
                'nota' => 2,
                'isLiked' => false,
            ],
        ]);

        DB::table('tb_user_disco')->insert([
            [
                'id_user' => '2',
                'id_disco' => '1',
                'isLiked' => true,
                'hasCommentary' => true,
                'isListened' => true,
                'nota' => '5'
            ],
            [
                'id_user' => '2',
                'id_disco' => '2',
                'isLiked' => true,
                'hasCommentary' => true,
                'isListened' => true,
                'nota' => 5
            ],
            [
                'id_user' => '2',
                'id_disco' => '3',
                'isLiked' => true,
                'hasCommentary' => true,
                'isListened' => true,
                'nota' => 5
            ],
            [
                'id_user' => '2',
                'id_disco' => '4',
                'isLiked' => true,
                'hasCommentary' => true,
                'isListened' => true,
                'nota' => 5
            ],
            [
                'id_user' => '2',
                'id_disco' => '5',
                'isLiked' => true,
                'hasCommentary' => true,
                'isListened' => true,
                'nota' => 5
            ],
            [
                'id_user' => '2',
                'id_disco' => '6',
                'isLiked' => true,
                'hasCommentary' => true,
                'isListened' => true,
                'nota' => 5
            ],
            [
                'id_user' => '2',
                'id_disco' => '7',
                'hasCommentary' => true,
                'isLiked' => true,
                'isListened' => true,
                'nota' => 5
            ],
            [
                'id_user' => '3',
                'id_disco' => '1',
                'hasCommentary' => true,
                'isLiked' => true,
                'isListened' => true,
                'nota' => 5
            ],
            [
                'id_user' => '3',
                'id_disco' => '2',
                'hasCommentary' => true,
                'isLiked' => true,
                'isListened' => true,
                'nota' => 5
            ],
            [
                'id_user' => '3',
                'id_disco' => '3',
                'hasCommentary' => true,
                'isLiked' => true,
                'isListened' => true,
                'nota' => 5
            ],
            [
                'id_user' => '3',
                'id_disco' => '4',
                'hasCommentary' => true,
                'isLiked' => true,
                'isListened' => true,
                'nota' => 5
            ],
            [
                'id_user' => '3',
                'id_disco' => '5',
                'hasCommentary' => true,
                'isLiked' => true,
                'isListened' => true,
                'nota' => 5
            ],
            [
                'id_user' => '3',
                'id_disco' => '6',
                'hasCommentary' => true,
                'isLiked' => true,
                'isListened' => true,
                'nota' => 5
            ],
            [
                'id_user' => '3',
                'id_disco' => '7',
                'hasCommentary' => true,
                'isLiked' => true,
                'isListened' => true,
                'nota' => 5
            ],
        ]);
    }
}
