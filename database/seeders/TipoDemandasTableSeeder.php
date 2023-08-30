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
                'ds_tipo_demanda' => 'buraco',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ds_tipo_demanda' => 'cano jorrando água na rua',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ds_tipo_demanda' => 'sinalização',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ds_tipo_demanda' => 'asfalto',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ds_tipo_demanda' => 'bueiro',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ds_tipo_demanda' => 'pontes',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ds_tipo_demanda' => 'coleta de lixo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ds_tipo_demanda' => 'limpeza nas ruas',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ds_tipo_demanda' => 'acessibilidade para pessoas com deficiência',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ds_tipo_demanda' => 'estrada rural',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ds_tipo_demanda' => 'drenagem',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
