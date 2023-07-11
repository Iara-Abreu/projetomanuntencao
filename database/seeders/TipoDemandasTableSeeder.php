<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class TipoDemandasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('tipo_demandas')->insert([
            [
                'ds_tipo_demanda' => 'rua',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ds_tipo_demanda' => 'poste',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ds_tipo_demanda' => 'banheiro',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
