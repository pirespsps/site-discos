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
            ],
            [
                'id_user' => '1',
                'id_disco' => '2',
            ],
            [
                'id_user' => '1',
                'id_disco' => '3',
            ],
            [
                'id_user' => '1',
                'id_disco' => '4',
            ],
            [
                'id_user' => '1',
                'id_disco' => '5',
            ],
            [
                'id_user' => '1',
                'id_disco' => '6',
            ],
            [
                'id_user' => '1',
                'id_disco' => '7',
            ],[
                'id_user' => '1',
                'id_disco' => '8',
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
