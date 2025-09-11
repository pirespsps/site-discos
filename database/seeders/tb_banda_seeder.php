<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class tb_banda_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tb_banda')->insert([
            [
                'nome' => 'Mad Season',
                'local' => 'Estados Unidos',
                'ano' => '1994',
                'path_img' => 'images/bandas/madseason.jpg',
            ],
            [
                'nome' => 'Alice in chains',
                'local' => 'Estados Unidos',
                'ano' => '1987',
                'path_img' => 'images/bandas/aliceinchains.jpg',
            ],
            [
                'nome' => 'Arctic Monkeys',
                'local' => 'Reino Unido',
                'ano' => '2002',
                'path_img' => 'images/bandas/arcticmonekys.jpg',
            ],
            [
                'nome' => 'Dissection',
                'local' => 'Suécia',
                'ano' => '1989',
                'path_img' => 'images/bandas/dissection.jpg',
            ],
            [
                'nome' => 'Mastodon',
                'local' => 'Estados Unidos',
                'ano' => '1999',
                'path_img' => 'images/bandas/mastodon.jpg',
            ],
            [
                'nome' => 'Radiohead',
                'local' => 'Reino Unido',
                'ano' => '1985',
                'path_img' => 'images/bandas/radiohead.jpg',
            ],
            [
                'nome' => 'Sonic Youth',
                'local' => 'Estados Unidos',
                'ano' => '1981',
                'path_img' => 'images/bandas/sonicyouth.jpg',
            ],
        ]);
    }
}
