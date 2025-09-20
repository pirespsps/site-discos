<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class tb_track_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tb_track')->insert(
            [
                [
                    'nome' => 'Wake Up',
                    'duracao' => '00:07:38',
                    'id_disco' => '1',
                ],[
                    'nome' => 'X-Ray Mind',
                    'duracao' => '00:05:12',
                    'id_disco' => '1',
                ],[
                    'nome' => 'River of Deceit',
                    'duracao' => '00:05:04',
                    'id_disco' => '1',
                ],[
                    'nome' => "I'm Above",
                    'duracao' => '00:05:44',
                    'id_disco' => '1',
                ],[
                    'nome' => 'Artificial Red',
                    'duracao' => '00:06:16',
                    'id_disco' => '1',
                ],[
                    'nome' => 'Lifeless Dead',
                    'duracao' => '00:04:29',
                    'id_disco' => '1',
                ],[
                    'nome' => "I Don't Know Anything",
                    'duracao' => '00:05:01',
                    'id_disco' => '1',
                ],[
                    'nome' => 'Long Gone Day',
                    'duracao' => '00:04:52',
                    'id_disco' => '1',
                ],[
                    'nome' => 'November Hotel',
                    'duracao' => '00:07:08',
                    'id_disco' => '1',
                ],[
                    'nome' => 'All Alone',
                    'duracao' => '00:04:12',
                    'id_disco' => '1',
                ],
            ]
            );
    }
}
