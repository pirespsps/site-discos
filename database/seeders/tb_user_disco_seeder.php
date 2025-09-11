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
            ],
        ]);
    }
}
