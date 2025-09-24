<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class tb_tag_banda_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tb_tag_banda')->insert([
            [
                'id' => 1,
                'id_tag' => 1,
                'id_banda' => 1,     
            ],
            [
                'id' => 2,
                'id_tag' => 5,
                'id_banda' => 1,     
            ],
            [
                'id' => 3,
                'id_tag' => 1,
                'id_banda' => 2,     
            ],
            [
                'id' => 4,
                'id_tag' => 3,
                'id_banda' => 2,     
            ],
            [
                'id' => 5,
                'id_tag' => 2,
                'id_banda' => 3,     
            ],
            [
                'id' => 6,
                'id_tag' => 4,
                'id_banda' => 4,     
            ],
            [
                'id' => 7,
                'id_tag' => 3,
                'id_banda' => 4,     
            ],
        ]);
    }
}
