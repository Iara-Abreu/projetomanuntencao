<?php

namespace Database\Seeders;

use App\Models\Situacao;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SituacaoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $situacao = [
            'abertas',
            'concluídas'
        ];
        foreach ($situacao as $situ) {
            Situacao::create([
                'ds_situacao' => $situ
            ]);
        }
    }
}
