<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class tb_tag_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tb_tag')->insert([
            [
                'value' => 'Grunge'
            ],
            [
                'value' => 'Indie Rock'
            ],
            [
                'value' => 'Metal'
            ],
            [
                'value' => 'Death Metal'
            ],
            [
                'value' => 'Hard Rock'
            ],[
                'value' => 'Pop'
            ],
        ]);
    }
}
