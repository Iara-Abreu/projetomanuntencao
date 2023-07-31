<?php

namespace Database\Seeders;

use Database\Seeders\BairroTableSeeder;
use Database\Seeders\PerfTableSeeder;
use Database\Seeders\TipoDemandasTableSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(BairroTableSeeder::class);
        $this->call(PerfTableSeeder::class);
        $this->call(TipoDemandasTableSeeder::class);
        $this->call(SituacaoTableSeeder::class);

    }
}
