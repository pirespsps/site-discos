<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class tb_comentario_disco_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tb_comentario_disco')->insert([
        [
            'id_comentario' => 1,
            'id_disco' => 1
        ],

        ]);
    }
}
