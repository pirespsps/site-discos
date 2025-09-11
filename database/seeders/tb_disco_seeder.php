<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class tb_disco_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tb_disco')->insert([
            [
                'titulo' => 'Above',
                'ano' => '1995',
                'path_img' => 'images/discos/above.jpg',
                'id_banda' => '1',
            ],[
                'titulo' => 'Dirt',
                'ano' => '1992',
                'path_img' => 'images/discos/dirt.jpg',
                'id_banda' => '2',
            ],[
                'titulo' => 'Favourite Worst Nightmare',
                'ano' => '2007',
                'path_img' => 'images/discos/favourite-worst-nightmare.jpeg',
                'id_banda' => '3',
            ],[
                'titulo' => 'Dissection',
                'ano' => '1995',
                'path_img' => 'images/discos/stormofthelightsbane.png',
                'id_banda' => '4',
            ],[
                'titulo' => 'Blood and Thunder',
                'ano' => '2004',
                'path_img' => 'images/discos/bloodandthunder.jpg',
                'id_banda' => '5',
            ],[
                'titulo' => 'OK Computer',
                'ano' => '1997',
                'path_img' => 'images/discos/okcomputer.jpg',
                'id_banda' => '6',
            ],[
                'titulo' => 'Goo',
                'ano' => '1990',
                'path_img' => 'images/discos/goo.jpg',
                'id_banda' => '7',
            ]
        ]);
    }
}
