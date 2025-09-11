<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Chamar outras seeders aqui
        // $this->call(UserSeeder::class);
        $this->call(tb_banda_seeder::class);
        $this->call(tb_user_seeder::class);
        $this->call(tb_disco_seeder::class);
        $this->call(tb_user_disco_seeder::class);

    }
}

