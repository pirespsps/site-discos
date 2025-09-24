<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class tb_tag_disco_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tb_tag_disco')->insert([
            [
                'id' => 1,
                'id_tag' => 1,
                'id_disco' => 1
            ],
            [
                'id' => 2,
                'id_tag' => 1,
                'id_disco' => 2
            ],
            [
                'id' => 3,
                'id_tag' => 3,
                'id_disco' => 2
            ],
            [
                'id' => 3,
                'id_tag' => 2,
                'id_disco' => 3
            ],
            [
                'id' => 4,
                'id_tag' => 4,
                'id_disco' => 4
            ],
        ]);
    }
}
