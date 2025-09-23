<?php

namespace Database\Seeders;

use DB;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class tb_user_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tb_user')->insert([
            [
                'user' => "teste",
                'email' => "teste@email.com",
                'senha' =>  Hash::make('teste123')
            ],
            [
                'user' => "user 1",
                'email' => "user1@email.com",
                'senha' =>  Hash::make('user1123')
            ],
            [
                'user' => "user 2",
                'email' => "user3@email.com",
                'senha' =>  Hash::make('user2123')
            ],
            [
                'user' => "user 3",
                'email' => "user3@email.com",
                'senha' =>  Hash::make('user3123')
            ],
        ]);
    }
}
