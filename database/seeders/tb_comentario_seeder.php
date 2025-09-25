<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class tb_comentario_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tb_comentario')->insert([
        [
            'texto' => "Esse disco é muito legal",
            'id_user' => 1
        ],
        
        ]);
    }
}
