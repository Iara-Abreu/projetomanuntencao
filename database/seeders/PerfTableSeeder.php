<?php

namespace Database\Seeders;

use App\Models\Perfil;
use Illuminate\Database\Seeder;

class PerfTableSeeder extends Seeder
{
    public function run()
    {
        $perfis = ['admin', 'cidadao', 'servidor'];

        foreach ($perfis as $perfil) {
            Perfil::create([
                'ds_perfil' => $perfil,
            ]);
        }
    }
}

